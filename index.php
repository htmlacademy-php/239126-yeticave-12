<?php

/**
 * @var $categories
 * @var $promos_list
 * @var $is_auth
 * @var $user_name
 * @var $con
 * @var $categories_sql_query
 * @var $promos_list_sql_query
 */

require_once('data.php');
require_once('functions.php');
require_once('helpers.php');
require_once('init_db.php');

$categories = select_from_db($con, $categories_sql_query);
$promos_list = select_from_db($con, sprintf($promos_list_sql_query, '2021-02-10'));

$main_content = include_template('main.php', ['promos_list' => $promos_list, 'categories' => $categories]);
$header_content = include_template('header.php', ['is_auth' => $is_auth, 'user_name' => $user_name]);
$footer_content = include_template('footer.php', ['categories' => $categories]);

$layout_content = include_template('layout.php', [
    'header_content' => $header_content,
    'main_content' => $main_content,
    'footer_content' => $footer_content,
    'title' => 'Главная'
]);

print($layout_content);
