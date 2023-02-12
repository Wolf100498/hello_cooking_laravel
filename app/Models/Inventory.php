<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $fillable = [
        'product_id',
        'product_name',
        'stock_in',
        'stock_out',
        'stock_sales',
    ];
    


    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}