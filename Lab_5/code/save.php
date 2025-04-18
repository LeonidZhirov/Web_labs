<?php
function redirectToHome() : void {
    header('Location: /');
    exit();
}

if (!isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    redirectToHome();
}

$email = $_POST['email'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];

$filePath = "Категории/{$category}/{$email}/{$title}.txt";

if (!file_exists("Категории/{$category}/{$email}")) {
    mkdir("Категории/{$category}/{$email}");
}

if (!file_put_contents($filePath, $description)) {
    throw new Exception('Что пошло не так!');
}
redirectToHome();