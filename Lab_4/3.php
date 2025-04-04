<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    $text = $_POST['text'];
    
    // Подсчёт знаков препинания
    $punctuation = preg_match_all('/[.,!?;:"«»—–()-]/u', $text, $matches);
    
    // Подсчёт цифр
    $digits = preg_match_all('/\d/', $text, $matches);
    
    // Вывод результатов
    echo "<h3>Результаты анализа:</h3>";
    echo "Количество знаков препинания: " . $punctuation . "<br>";
    echo "Количество цифр: " . $digits;
} else {
    echo "Ошибка: не получен текст для анализа";
}
