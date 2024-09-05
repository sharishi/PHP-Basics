<?php
require 'config.php';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db_name;user=$username;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Соединение с базой данных успешно установлено";
} catch (PDOException $e) {
    die ("Ошибка при подключении к базе данных: " . $e->getMessage());
}

