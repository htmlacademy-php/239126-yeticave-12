<?php
/**
 * @var $title
 * @var $header_content
 * @var $main_content
 * @var $footer_content
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$title;?></title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="page-wrapper">

<header class="main-header">
    <?=$header_content;?>
</header>

<main class="container">
    <?=$main_content;?>
</main>

</div>

<footer class="main-footer">
    <?=$footer_content;?>
</footer>

<script src="flatpickr.js"></script>
<script src="script.js"></script>
</body>
</html>
