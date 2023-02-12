<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_desc',
        'product_img',
        'product_status',
        'product_tags',
        'product_cat'
    ];


    public function featuredproduct(){
        return $this->hasOne(FeaturedProducts::class);
    }

    public function stockproduct(){
        return $this->hasMany(Stock::class, 'product_id');
    }

    public function inventory(){
        return $this->hasOne(Inventory::class);
    }


}
