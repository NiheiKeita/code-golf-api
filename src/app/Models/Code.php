<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function getCodeByteAttribute()
    {
        return strlen($this->code);
    }

    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            [
                'code_byte' => $this->code_byte,
                'user_name' => $this->user->name
            ]
        );
    }

    public function scopeMaxCodeBytePerUser(Builder $query)
    {
        return $query->get()->groupBy('user_id')->map(function ($group) {
            return $group->sortBy('code_byte')->first();
        })->sortBy('code_byte')->flatten();
    }
}
