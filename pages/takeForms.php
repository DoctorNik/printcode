<?php
// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $email = $_POST['email'];
    $category = $_POST['theme'];
    $message = $_POST['message'];

    // Подготовка SQL-запроса
    $sql = "INSERT INTO applications (email, category, messages) VALUES (:email, :category, :messages)";
    $stmt = $pdo->prepare($sql);

    // Выполнение запроса
    $stmt->execute([
        ':email' => $email,
        ':theme' => $category,
        ':messages' => $message
    ]);

    // Перенаправление пользователя или отображение сообщения об успешной отправке
    echo "Your information has been submitted successfully!";
}
?>