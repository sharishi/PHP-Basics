# Отчет по девятой            лабораторной работе

1. [Инструкции по запуску проекта](#1-инструкции-по-запуску-проекта).
2. [Описание проекта](#2-описание-проекта).
3. [Краткая документация к проекту](#3-краткая-документация-к-проекту).
4. [Примеры использования проекта с приложением скриншотов или фрагментов кода](#4-пример-использования-проекта-с-приложением-скриншотов).
5. [Список использованных источников](#5-список-использованных-источников).

## 1. Инструкции по запуску проекта

Данные инструкции действительны при использовании PhpStorm, в ином случае, воспользуйтесь приведенной ссылкой:
[запуск проекта с gitHub](https://www.youtube.com/watch?v=6N6JFynR0gM)

1. Клонируйте репозиторий:
   ```bash
   https://github.com/sharishi/php_labs.git
2. Запустите проект:
   <!-- Если у вас есть веб-сервер (например, Apache или Nginx), настройте его так, чтобы корневой каталог указывал на
   каталог вашего проекта.  
   Если у вас нет веб-сервера, вы можете использовать встроенный сервер PHP для тестирования: -->
   ```bash 
   php -S localhost:8000 labs\lab_9\admin\index.php

## 2. Описание проекта

В рамках данного задания была разработана структура базы данных для хранения информации о пользователях и комментариях. Были созданы две таблицы:

Таблица users, содержащая информацию о пользователях. В этой таблице определены следующие поля:

1. id (тип данных INTEGER) — первичный ключ, уникальный идентификатор пользователя.
2. name (тип данных TEXT) — поле для хранения имени пользователя.
3. surname (тип данных TEXT) — поле для хранения фамилии пользователя.
4. email (тип данных TEXT) — уникальное поле, содержащее адрес электронной почты пользователя.

Таблица comments, предназначенная для хранения комментариев пользователей.
В данной таблице определены следующие поля:

1. id (тип данных INTEGER) — первичный ключ, уникальный идентификатор комментария.
2. user_id (тип данных INTEGER) — внешний ключ, связывающий комментарий с определенным пользователем из таблицы users.
3. comment (тип данных TEXT) — поле, содержащее текст комментария.
После определения структуры базы данных был выполнен экспорт базы данных в файл формата .sql.
Этот файл был сохранен в директории /data, согласно требованиям задания.
Директория /data была создана в проекте для хранения экспортированного файла и других данных,
связанных с базой данных.

## 3. Краткая документация к проекту

#### index.php

```php

<?php

require 'config.php';
$cn = pg_connect("host=".$host." port=".$port." dbname=".$db_name." user=".$username." password=".$password);
if ($cn) {
    echo "Connected successfully!";
    $result = pg_query($cn, "SELECT * FROM users");
    while ($row = pg_fetch_object($result)) {
        echo "<br/>" . $row->name;
    }
    $exportFile = 'data/database_backup.sql';
    $exportCommand = "pg_dump -U vika -h localhost postgres > $exportFile";
    exec($exportCommand);

    pg_close($cn);

} else {
    echo "Connection failed!";
}
?>
```

#### comments.php

```php
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

```

#### form.php

```php
<form action="handlers/form-handler.php" method="post">
    <h2>Оставьте комментарий</h2>
    <label for="name">Ваше имя:</label>
    <input type="text" id="name" name="name" required>
    <label for="comment">Ваш комментарий:</label>
    <textarea id="comment" name="comment" rows="4" required></textarea>
    <input type="submit" value="Отправить">
</form>

```

#### form_handler.php

```php
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
```

## 4. Пример использования проекта (с приложением скриншотов)

1. [index.php](#indexphp).
   ![Пример работы программы](images/img.png)


## 5. Список использованных источников

1. [PHP Reference](https://www.w3schools.com/php/php_ref_overview.asp)
2. [PHP Documents](https://yaaver.com/php-help/)