<?php
$is_auth = rand(0, 1);

$user_name = 'Иван Иванов';
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$promos_list = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10999,
        'url' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 159999,
        'url' => 'img/lot-2.jpg'
   ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'url' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'url' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'url' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'url' => 'img/lot-6.jpg'
    ]
];

function format_price($price) : string
{
    $ceil_price = ceil($price);

    if ($ceil_price >= 1000) {
        return number_format($ceil_price, 0, ' ', ' ') . ' ₽';
    }

    return strval($ceil_price) . ' ₽';
}

function esc($str) : string
{
    return htmlspecialchars($str);
}

require_once('helpers.php');

$page_content = include_template('main.php', ['promos_list' => $promos_list, 'categories' => $categories]);
$layout_content = include_template('layout.php', [
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная'
]);

print($layout_content);
