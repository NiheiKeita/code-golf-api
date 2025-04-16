<?php

namespace App\Models;

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

    /**
     *@return BelongsTo<User, Code>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     *@return BelongsTo<Question, Code>
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @return int
     */
    public function getCodeByteAttribute(): int
    {
        return strlen((string) $this->code);
    }

    /**
     * The attributes that should be cast.
     *
     * @return array
     */
    public function toArray(): array
    {
        $user = $this->user;
        $result = array_merge(
            parent::toArray(),
            [
                'code_byte' => $this->code_byte,
                'user_name' => $user?->name ?? '',
            ]
        );
        return $result;
    }

    // public function scopeMaxCodeBytePerUser(Builder $query)
    // {

    //     return $query->get()->groupBy('user_id')->map(function ($group) {
    //         return $group->sortBy('code_byte')->first();
    //     })->sortBy('code_byte')->flatten();
    // }
}
