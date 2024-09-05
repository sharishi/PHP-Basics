<?php
// Путь к файлу, в который будут сохраняться комментарии
$filePath = 'comments.txt';

// Получаем данные из формы
$name = $_POST['name'] ?? '';
$comment = $_POST['comment'] ?? '';

// Формируем строку для записи в файл
$commentData = "Name: $name\nComment: $comment\n\n";

// Открываем файл для добавления новой информации
$fileHandle = fopen($filePath, 'a');

if ($fileHandle) {
    fwrite($fileHandle, $commentData);
    fclose($fileHandle);
    header("Location: ../index.php");
    echo "Комментарий успешно сохранен.";
} else {
    echo "Ошибка при сохранении комментария.";
}


