<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_data'] = [
        'name' => htmlspecialchars($_POST['name']),
        'profession' => htmlspecialchars($_POST['profession']),
        'experience' => (int)$_POST['experience']
    ];
    
    header('Location: 4_page_2.php');
    exit;
}

header('Location: 4.html');
exit;