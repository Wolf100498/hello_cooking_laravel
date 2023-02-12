<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    // use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'user_id', 
        'status', 
        'grand_total',
        'item_count',
        'payment_status',
        'payment_method',
        'name',
        'email',
        'address',
        'phone',
        'notes'
    ];

    /**
     * Get all of the orderItems for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }


}
