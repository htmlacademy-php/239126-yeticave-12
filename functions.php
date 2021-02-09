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
    $now = new DateTime();
    $end_date = DateTime::createFromFormat('Y-m-d H:i:s', $expiry_date);
    $end_date->setTime(23,59);
    $diff = $now->diff($end_date);

    $hours = 0;
    $minutes = 0;

    if ($diff->invert === 0) {
        $hours = $diff->d * 24 + $diff->h; // получаем разницу между датами в часах
        $minutes = $diff->i; // для общего стиля присваиваю остаток минут в переменную
    }

    return array(
        'hours' => str_pad($hours, 2, '0', STR_PAD_LEFT),
        'minutes' => str_pad($minutes, 2, '0', STR_PAD_LEFT)
    );
}

function is_hours_equals_zero($hours) : string
{
    return (intval($hours) === 0) ? 'timer--finishing' : '';
}

function select_from_db($con, $sql) : array
{
    $res = mysqli_query($con, $sql);

    if ($res) {
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    return [];
}
