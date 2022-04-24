<?php

use Illuminate\Support\Str;

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'Alpineapple',
    'description' => 'Alpine JS UI Components.',
    'collections' => [
        'ui_components' => [
            'path' => '{-title}'
        ]
    ],
    'selected' => function ($page, $section) {
        return Str::contains($page->getPath(), $section) ? 'selected' : '';
    },
];
