<?php
$servername = "localhost";
$database = "yandex";
$username = "admin";
$password = "admin";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
