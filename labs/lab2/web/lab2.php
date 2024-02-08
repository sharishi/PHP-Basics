<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab2</title>
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
<table class="sweb">
    <tbody>
    <tr>
        <td colspan="3"><b>График работы докторов, каб. 333</b></td>
    </tr>
    <tr class="highlighted-row">
        <td>П.н.</td>
        <td>Фамилия, имя</td>
        <td>График</td>
    </tr>
    <tr>
        <td>1.</td>
        <td>Аксенти Елена</td>
        <td><?php echo getWorkingHours(); ?></td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Петрова Мария</td>
        <td><?php echo getWorkingHours(); ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>


<?php
function getWorkingHours() {
    $currentDayOfWeek = date('N');

    if ($currentDayOfWeek == 1 || $currentDayOfWeek == 3 || $currentDayOfWeek == 5) {
        return "8:00-12:00";
    } elseif ($currentDayOfWeek == 2 || $currentDayOfWeek == 4 || $currentDayOfWeek == 6) {
        return "12:00-16:00";
    } else {
        return "Нерабочий день";
    }
}
