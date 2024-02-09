<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Заголовок документа, устанавливающий кодировку символов и настройки просмотра -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab2</title>
    <!-- Внутренний стиль для таблицы -->
    <style>
        .sweb {
            border-collapse: collapse;
        }

        .sweb td {
            border: 1px solid black;
            padding: 8px;
        }

        .highlighted-row td {
            background-color: #9db487;
        }
    </style>
</head>
<body>
<!-- Таблица, отображающая график работы докторов -->
<table class="sweb">
    <tbody>
    <!-- Заголовок таблицы -->
    <tr>
        <td colspan="3"><b>График работы докторов, каб. 333</b></td>
    </tr>
    <!-- Строка таблицы для заголовков столбцов -->
    <tr class="highlighted-row">
        <td>П.н.</td>
        <td>Фамилия, имя</td>
        <td>График</td>
    </tr>
    <!-- Строка таблицы для первого доктора -->
    <tr>
        <td>1.</td>
        <td>Аксенти Елена</td>
        <!-- Вывод графика работы первого доктора с помощью вызова функции -->
        <td><?php echo getWorkingHours(); ?></td>
</tr>
<!-- Строка таблицы для второго доктора -->
<tr>
    <td>2.</td>
    <td>Петрова Мария</td>
    <!-- Вывод графика работы второго доктора с помощью вызова функции -->
    <td><?php echo getWorkingHours(); ?></td>
</tr>
</tbody>
</table>
</body>
</html>

<?php
// Определение функции для получения графика работы в зависимости от текущего дня недели
function getWorkingHours() {
    // Получаю текущий день недели
    $currentDayOfWeek = date('N');

    // Определяю график работы в зависимости от текущего дня недели
    if ($currentDayOfWeek == 1 || $currentDayOfWeek == 3 || $currentDayOfWeek == 5) {
        return "8:00-12:00"; // График работы для понедельника, среды и пятницы
    } elseif ($currentDayOfWeek == 2 || $currentDayOfWeek == 4 || $currentDayOfWeek == 6) {
        return "12:00-16:00"; // График работы для вторника, четверга и субботы
    } else {
        return "Нерабочий день"; // В случае, если текущий день недели не совпадает ни с одним из условий
    }
}
