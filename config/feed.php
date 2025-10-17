<?php

return [
    'feeds' => [
        'main' => [
            // Gọi method trong model News để lấy danh sách bài viết
            'items' => [\App\Models\News::class, 'getFeedItems'],

            // URL để truy cập RSS feed
            'url' => '/feed',

            // Tiêu đề và mô tả của feed
            'title' => 'Tin tức âm nhạc mới nhất',
            'description' => 'Các bài viết mới nhất từ website âm nhạc của bạn',
            'language' => 'vi',

            // Không cần logo feed (bạn có thể thêm link ảnh nếu muốn)
            'image' => '',

            // Định dạng của feed: có thể là 'rss', 'atom', hoặc 'json'
            'format' => 'rss',

            // Giao diện hiển thị feed (dùng mặc định)
            'view' => 'feed::rss',

            'type' => '',
            'contentType' => '',
        ],
    ],
];
