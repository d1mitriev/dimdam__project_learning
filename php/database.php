<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем данные из тела запроса (POST-запрос)
$postData = json_decode(file_get_contents("php://input"), true);

// Проверяем, что 'dateIn' существует и не является null
if (isset($postData['dateIn']) && $postData['dateIn'] !== null) {
    // Вставка данных в таблицу "order"
    $sql = "INSERT INTO `order` (dateIn, dateOut, man, children, city, taxi, food) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $postData['dateIn'], $postData['dateOut'], $postData['man'], $postData['children'], $postData['city'], $postData['additionalServices']['taxi'], $postData['additionalServices']['food']);
    
    // Попробуйте выполнить запрос
    try {
        $stmt->execute();
        echo json_encode(['success' => true]);
    } catch (mysqli_sql_exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'dateIn is not set or is null']);
}

// Закрываем подключение
$conn->close();
?>
