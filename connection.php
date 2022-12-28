<?php
$servername = "localhost";
$database = "yandex";
$username = "root";
$password = "qwerty123";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
