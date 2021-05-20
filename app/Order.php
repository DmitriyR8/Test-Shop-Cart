<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'shipping_id',
        'total_price',
    ];

    /**
     * @return HasMany
     */
    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    /**
     * @return HasOne
     */
    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'shipping_id');
    }
}
