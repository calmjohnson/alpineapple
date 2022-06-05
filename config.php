<?php

use Illuminate\Support\Str;

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'Alpineapple',
    'description' => 'Free and open source Alpine JS UI Components styled with Tailwind Css.',
    'collections' => [
        'ui_components' => [
            'path' => '{-title}'
        ]
    ],
    'selected' => function ($page, $section) {
        return Str::contains($page->getPath(), $section) ? 'selected' : '';
    },
];
