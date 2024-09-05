<?php
// Проверяем, является ли метод запроса POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем параметр 'rating' из данных POST
    $rating = $_POST["rating"];

    // Проверяем, не пуст ли параметр 'rating'
    if (!empty($rating)) {
        // Определяем файл, в котором будет храниться информация
        $file = "data.txt";

        // Читаем существующие данные из файла
        $data = file_get_contents($file);

        // Проверяем, содержит ли файл какие-либо данные
        if (!empty($data)) {
            // Декодируем JSON-данные в ассоциативный массив
            $data = json_decode($data, true);
        } else {
            // Если файл пуст, инициализируем пустой массив
            $data = array();
        }

        // Увеличиваем счетчик указанного 'rating' или устанавливаем его в 1, если отсутствует
        $data[$rating] = isset($data[$rating]) ? $data[$rating] + 1 : 1;

        // Кодируем обновленные данные в формат JSON и записываем их обратно в файл
        file_put_contents($file, json_encode($data));
    }
}

// Перенаправляем пользователя на страницу 'index.php'
header("Location: index.php");


