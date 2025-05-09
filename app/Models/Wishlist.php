<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'product_id'];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
