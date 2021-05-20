<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Address
 * @package App
 */
class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address',
    ];

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
