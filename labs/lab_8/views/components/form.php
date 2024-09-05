<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма для комментариев</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #227a2d;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #227a2d;
        }
    </style>
</head>
<body>

<form action="handlers/form-handler.php" method="post">
    <h2>Оставьте комментарий</h2>
    <label for="name">Ваше имя:</label>
    <input type="text" id="name" name="name" required>
    <label for="comment">Ваш комментарий:</label>
    <textarea id="comment" name="comment" rows="4" required></textarea>
    <input type="submit" value="Отправить">
</form>


<div>


</div>
</body>
</html>

