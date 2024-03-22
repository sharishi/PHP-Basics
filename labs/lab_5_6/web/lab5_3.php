<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваша страница</title>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 3px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="reset"],
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>

</head>
<body>
<?php if (!isset($_REQUEST['start'])) { ?>

    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <div>
            <label>Ваше имя: <input name="name" type="text" size="30"></label>
        </div>
        <div>
            <label>Ваш возраст: <input name="age" type="number" min="1"></label>
        </div>
        <div>
            <label>Ваш E-mail: <input name="email" type="email"></label>
        </div>
        <div>
            <label>Ваше мнение о нас напишите тут:
                <textarea name="message" cols="40" rows="4" placeholder="Ваше мнение..."></textarea>
            </label>
        </div>
        <div>
            <input type="reset" value="Стереть"/>
            <input type="submit" value="Передать" name="start"/>
        </div>
    </form>
</body>
</html>
<?php } else {
    // Данные с формы
    $data = [
        'name' => isset($_POST['name']) ? $_POST['name'] : "",
        'age' => isset($_POST['age']) ? $_POST['age'] : "",
        'email' => isset($_POST['email']) ? $_POST['email'] : "",
        'message' => isset($_POST['message']) ? $_POST['message'] : "",
    ];
    // Сохранение данных в файл
    $file = fopen('../files/messages.txt', 'a+') or die("Недоступный файл!");
    foreach ($data as $field => $value) {
        // Добавление разделителя между полями
        fwrite($file, "$field: $value\n");
    }
    fwrite($file, "--------------------\n");
    fclose($file);
    // Вывод данных на экран
    echo 'The data has been saved! This is what is stored in the file <br />';
    $file = fopen("../files/messages.txt", "r") or die("Unavailable file!");
    while (!feof($file)) {
        echo fgets($file) . "<br />";
    }
    fclose($file);
}


