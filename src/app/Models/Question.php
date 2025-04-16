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

    /**
     * @return HasMany<Code>
     */
    public function codes(): HasMany
    {
        return $this->hasMany(Code::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @return mixed
     */
    public function getMaxCodeBytePerUser(): mixed
    {
        // return $this->codes()->maxCodeBytePerUser();
        $result = $this->codes
        ->groupBy('user_id')
        ->map(fn($group) => $group->sortBy('code_byte')->first())
        ->sortBy('code_byte')
        ->values();
        return $result;
    }
}
