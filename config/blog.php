<?php

return [
    'name' => "Chia2",
    'title' => "Chia2 Blog",
    'subtitle' => 'http://blog.chia2.com',
    'description' => 'Share',
    'author' => 'Chia2',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 5,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage',
    ],
    'contact_email' => env('MAIL_FROM_ADDRESS')
];

