<?php
$host = "localhost";
$port = "5432";
$db_name = 'student';
$username = '...';
$password = '...';

try {
    $connect = new PDO("pgsql:host=$host;port=$port;dbname=$db_name;user=$username;password=$password");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Соединение с базой данных успешно установлено";
} catch (PDOException $e) {
    die ("Ошибка при подключении к базе данных: " . $e->getMessage());
}
//Сохранение базы данных


//$command = "pg_dump -h $host -p $port -U $username -d $db_name > student.sql";
//exec($command);
//
//echo "База данных успешно экспортирована в файл student.sql";