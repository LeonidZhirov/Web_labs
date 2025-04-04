<?php
session_start();

if (!isset($_SESSION['user_data'])) {
    header('Location: index.html');
    exit;
}

$user = $_SESSION['user_data'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваши данные</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .info { background: #f5f5f5; padding: 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Ваши данные</h1>
    <div class="info">
        <p><strong>Имя:</strong> <?= $user['name'] ?></p>
        <p><strong>Профессия:</strong> <?= $user['profession'] ?></p>
        <p><strong>Стаж работы:</strong> <?= $user['experience'] ?> лет</p>
    </div>
    <p><a href="4.html">Вернуться к форме</a></p>
</body>
</html>