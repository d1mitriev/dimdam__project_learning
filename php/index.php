<?php
include 'database.php';
include 'mailer.php';
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой веб-сайт</title>
</head>
<body>
    <h1>Добро пожаловать на мой веб-сайт!</h1>

    <?php
    // Ваш PHP-код здесь
    echo "Привет, мир!";
    ?>
</body>
</html>
