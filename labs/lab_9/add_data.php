f <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление пользователя и комментария</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #a08484;
            transition: border-color 0.3s;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #54ca51;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #17c019;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #18de1b;
        }
    </style>

</head>
<body>
<div class="container">
    <h2>Добавление в базу данных</h2>
    <form action="process.php" method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name">
        <label for="surname">Фамилия:</label>
        <input type="text" id="surname" name="surname">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="comment">Комментарий:</label>
        <textarea id="comment" name="comment"></textarea>
        <input type="submit" value="Отправить">
    </form>
</div>
</body>
</html>