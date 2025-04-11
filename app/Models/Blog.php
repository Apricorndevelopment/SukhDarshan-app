<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['blog_type', 'blog_name', 'blog_shotdesc', 'blog_slug', 'blog_desc', 'blog_image', 'post_by'];
}
