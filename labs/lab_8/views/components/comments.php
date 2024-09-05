<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
    <style>
        /* CSS стили могут быть определены здесь или подключены через внешний файл */
        body {
            font-family: Arial, sans-serif;
        }
        .comment {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .comment p {
            margin: 0;
        }
    </style>
</head>
<body>

<h2>Отзывы</h2>

<?php
$filePath = "handlers/comments.txt";

// Проверяем, существует ли файл
if (file_exists($filePath)) {
    // Читаем содержимое файла
    $comments = file_get_contents($filePath);

    // Разбиваем содержимое файла на массив комментариев
    $commentsArray = explode("\n\n", $comments);

    // Выводим каждый комментарий
    foreach ($commentsArray as $comment) {
        if (!empty($comment)) {
            echo '<div class="comment"><p>' . nl2br($comment) . '</p></div>';
        }
    }
} else {
    echo 'Файл с комментариями не найден.';
}
?>

</body>
</html>

