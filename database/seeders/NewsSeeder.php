<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy các category
        $nhacPop = Category::where('slug', 'nhac-pop')->first();
        $nhacRap = Category::where('slug', 'nhac-rap')->first();
        $nhacTre = Category::where('slug', 'nhac-tre')->first();

        News::create([
            'title' => 'Top 10 ca khúc Pop hot nhất hiện nay',
            'slug' => 'top-10-pop-hot',
            'summary' => 'Danh sách những bản nhạc Pop đình đám đang dẫn đầu các bảng xếp hạng...',
            'content' => 'Nội dung chi tiết của bài viết về nhạc pop...',
            'category_id' => $nhacPop->id,
            'views' => 100,
            'image' => 'pop.jpg',
        ]);

        News::create([
            'title' => 'Rap Việt mùa mới có gì hot?',
            'slug' => 'rap-viet-mua-moi',
            'summary' => 'Cùng điểm qua những thay đổi thú vị trong chương trình Rap Việt...',
            'content' => 'Rap Việt mùa mới hứa hẹn bùng nổ với dàn huấn luyện viên mới...',
            'category_id' => $nhacRap->id,
            'views' => 85,
            'image' => 'rap.jpg',
        ]);

        News::create([
            'title' => 'Nhạc trẻ 2025: Xu hướng mới của giới trẻ',
            'slug' => 'nhac-tre-2025',
            'summary' => 'Tổng hợp những ca khúc nhạc trẻ đang được yêu thích nhất...',
            'content' => 'Thị trường nhạc trẻ năm 2025 đang có nhiều biến động thú vị...',
            'category_id' => $nhacTre->id,
            'views' => 50,
            'image' => 'nhactre.jpg',
        ]);

    }
}
