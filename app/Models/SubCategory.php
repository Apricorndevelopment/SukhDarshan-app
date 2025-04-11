<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = ['subcategory_name', 'subcategory_slug', 'catgeory_id', 'subcategory_image', 'status'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
