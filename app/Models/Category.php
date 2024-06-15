<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'seotitle', 'active', 'created_at', 'updated_at'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }

    public function publishedPosts()
    {
        return $this->belongsToMany(Post::class, 'category_post')->where('status', 'publish');
    }
}