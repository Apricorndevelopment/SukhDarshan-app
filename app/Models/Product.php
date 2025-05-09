<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['product_name', 'product_slug', 'sku', 'subcategory_id', 'product_image', 'product_shortdesc', 'product_desc', 'keyword', 'technical_specification', 'price', 'mrp', '	is_trending', '	is_top', 'is_promo', 'tax'];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function firstVariant()
    {
        return $this->hasOne(ProductVariant::class)->orderBy('price');
    }
}
