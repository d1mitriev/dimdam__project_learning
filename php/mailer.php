<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Получение данных из POST-запроса
$data = json_decode(file_get_contents('php://input'), true);
$orderId = $data['orderId'] ?? '';
$dateIn = $data['dateIn'] ?? '';
$dateOut = $data['dateOut'] ?? '';
$man = $data['man'] ?? '';
$children = $data['children'] ?? '';
$city = $data['city'] ?? '';
$additionalServices = $data['additionalServices'] ?? [];
$taxi = $additionalServices['taxi'] == 1 ? 'Да' : 'Нет';
$food = $additionalServices['food'] == 1 ? 'Да' : 'Нет';


// Настройки почтового сервера
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'pblock.help@gmail.com';
$mail->Password = 'tytytwhzzomhkrdp';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = 'UTF-8';

// Настройки отправителя и получателя
$mail->setFrom('pblock.help@gmail.com', 'Dimdam');
$mail->addAddress('dimitriy.gonchar@gmail.com', 'Димитрий');

// Установка темы письма и форматирование содержимого
$mail->Subject = 'Новый заказ с номером ' . $orderId;
$mail->Body = "Заказ № $orderId\n\nДата заезда: $dateIn\nДата выезда: $dateOut\nКоличество взрослых: $man\nКоличество детей: $children\nГород: $city\nТакси: $taxi\nЕда: $food";

// Отправка письма
try {
    $mail->send();
    echo json_encode(['success' => true, 'message' => 'Письмо успешно отправлено']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Ошибка при отправке письма: ' . $mail->ErrorInfo]);
}
?>
