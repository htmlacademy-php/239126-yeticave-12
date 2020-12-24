<?php
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

function timer_counter($expiry_date) : array
{
    $diff = date_diff(date_create('now'), date_create($expiry_date));
    $hours = 0;
    $minutes = 0;

    if ($diff->invert == 0) {
        $hours = $diff->days * 24 + $diff->h; // получаем разницу между датами в часах
        $minutes = $diff->i; // для общего стиля присваиваю остаток минут в переменную
    }

    return array(
        'hours' => str_pad($hours, 2, '0', STR_PAD_LEFT),
        'minutes' => str_pad($minutes, 2, '0', STR_PAD_LEFT)
    );
}

function is_hours_equals_zero($hours) : string
{
    return ($hours == 0) ? 'timer--finishing' : '';
}

