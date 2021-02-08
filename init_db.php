<?php
$db = require_once('config/db.php');

$con = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($con, 'utf8');

$categories_sql_query = "SELECT * FROM category";
$promos_list_sql_query = "
SELECT
	lot.name,
	IFNULL(bets.price, lot.starter_price) AS price,
	lot.img_src AS url,
	category.name AS category,
	lot.expiration_date AS expiry_date
FROM
	lot
LEFT JOIN (
	SELECT
		lot_id,
		MAX(price) AS price
	FROM
		bet
	GROUP BY
		lot_id) AS bets ON
	bets.lot_id = lot.id
LEFT JOIN category ON
	lot.category_id = category.id
WHERE
	lot.winner_id IS NULL
ORDER BY
	lot.date_creation DESC
LIMIT 9";
