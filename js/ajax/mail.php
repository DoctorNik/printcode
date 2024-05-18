<?php
    /*$email = $_POST['email'];
    $theme = $_POST['theme'];
    $message = $_POST['message'];
    $subject = "Сообщение с сайта " . 'Тема: ' . $theme;
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers   = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";
    $message_cont = $message . " пришло от " . $email;
    $success = mail('centaprint@mail.ru', $subject, $message_cont, $headers);*/

// Настройки базы данных
$host = "127.0.0.1";
$dbname = 'print';
$user = 'root';
$pass = '';
$charset = 'utf8';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Опции PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
];

try {
    // Создание соединения с базой данных
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Обработка ошибок подключения
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $email = $_POST['email'] ?? '';
    $category = $_POST['theme'] ?? '';
    $message = $_POST['message'] ?? ''; // Изменено с 'messages' на 'message'

    // Подготовка SQL-запроса
    $sql = "INSERT INTO applications (email, category, message) VALUES (:email, :category, :message)";
    $stmt = $pdo->prepare($sql);

    // Выполнение запроса
    $stmt->execute([
        ':email' => $email,
        ':category' => $category,
        ':message' => $message // Изменено с 'messages' на 'message'
    ]);

    // Перенаправление пользователя или отображение сообщения об успешной отправке
    echo "Your information has been submitted successfully!";
}

    // echo $success;
?>