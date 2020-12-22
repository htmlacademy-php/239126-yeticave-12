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

function timer_counter($expiry_date) : string
{
    $diff = intval(strtotime($expiry_date) - time());

    $hours = floor($diff / 3600);
    $minutes = floor(($diff % 3600) / 60);

    return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':'
        . str_pad($minutes, 2, '0', STR_PAD_LEFT);
}

function is_timer_finishing($expiry_date) : string
{
    return intval(timer_counter($expiry_date)) === 0 ? 'timer--finishing' : '';
}
