<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_post_id',
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
