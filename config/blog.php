<?php

return [
    'name' => "July",
    'title' => "July's Blog",
    'subtitle' => 'https://blog.chia2.com',
    'domain' => 'blog.chia2.com',
    'description' => 'Share',
    'author' => 'July',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 8,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage',
    ],
    'contact_email' => env('MAIL_FROM_ADDRESS')
];

