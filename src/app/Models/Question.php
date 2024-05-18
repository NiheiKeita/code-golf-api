<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [
        'id',
    ];

    public function codes(): HasMany
    {
        return $this->hasMany(Code::class);
    }
    public function scopeCodeRanking($query)
    {
        // return $query->whereHas('codes', function ($query) {
        //     return $query->groupBy('user_id')->map(function ($group) {
        //         return $group->sortBy('code_byte')->first();
        //     });
        // })->get();
        // return $query->codes()->get()->groupBy('user_id')->map(function ($group) {
        //     return $group->sortBy('code_byte')->first();
        // })->sortBy('code_byte');
    }
}
