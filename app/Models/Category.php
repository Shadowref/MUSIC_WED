<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];


    // app/Models/Category.php
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function showCategories()
{
    $categories = Category::all();  // Lấy tất cả thể loại
    return view('your-view', compact('categories'));
}

}
