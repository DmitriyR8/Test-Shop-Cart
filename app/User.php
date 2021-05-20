<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class User
 * @package App
 */
class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    /**
     * @return BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
