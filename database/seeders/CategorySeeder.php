<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Danh sách các category với slug và name
        $categories = [
            ['name' => 'Nhạc trẻ', 'slug' => 'nhac-tre'],
            ['name' => 'Nhạc pop', 'slug' => 'nhac-pop'],
            ['name' => 'Nhạc rap', 'slug' => 'nhac-rap'],
        ];

        // Lặp qua từng category để kiểm tra sự tồn tại của slug trước khi thêm
        foreach ($categories as $category) {
            // Kiểm tra xem slug đã tồn tại trong bảng categories chưa
            if (!Category::where('slug', $category['slug'])->exists()) {
                // Nếu chưa tồn tại, tạo mới category với tên và slug tương ứng
                Category::create([
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                ]);
            } else {
                // Nếu đã tồn tại, bạn có thể in ra thông báo hoặc bỏ qua
                echo "Category with slug '{$category['slug']}' already exists.\n";
            }
        }
    }
}
