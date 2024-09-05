<?php
$host = "localhost";
$port = "5432";
$db_name = 'Orders';
$username = '...';
$password = '...';

try {
    $connect = new PDO("pgsql:host=$host;port=$port;dbname=$db_name;user=$username;password=$password");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("Ошибка при подключении к базе данных: " . $e->getMessage());
}
