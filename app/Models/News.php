<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'category_id', 'image', 'audio', 'video',
        'summary', 'content', 'views'
    ];

    // Mỗi bài viết thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Mỗi bài viết có nhiều bình luận
    public function comments()
    {
        return $this->hasMany(Comment::class); // Một bài viết có nhiều bình luận
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

}
