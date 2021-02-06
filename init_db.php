<?php
$db = require_once('config/db.php');

$con = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($con, 'utf8');

$categories_sql_query = "SELECT * FROM category";
$promos_list_sql_query = "
SELECT
	lot.name,
	lot.starter_price as price,
	lot.img_src as url,
	category.name as category,
	lot.expiration_date as expiry_date
FROM
	lot
LEFT OUTER JOIN bet ON
	bet.lot_id = lot.id
JOIN category ON
	lot.category_id = category.id
WHERE
	lot.winner_id is NULL
ORDER BY
	lot.date_creation DESC
LIMIT 9";
