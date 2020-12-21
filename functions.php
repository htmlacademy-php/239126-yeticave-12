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
