<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Các trường có thể gán hàng loạt
    protected $fillable = [
        'news_id',
        'user_id',
        'content',
    ];

    /**
     * Bình luận thuộc về một người dùng
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Bình luận thuộc về một bài viết
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
