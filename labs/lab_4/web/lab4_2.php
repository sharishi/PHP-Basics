<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 16px;
            color: #4caf50; /* Зеленый цвет текста */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
    </style>
    <title>Форма с контроллерами</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="inputNumber">Введите число:</label>
    <input type="number" id="inputNumber" name="inputNumber">

    <label for="selectOption">Выберите опцию:</label>
    <select id="selectOption" name="selectOption" >
        <option value="" selected disabled>Select an option</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>

    <label for="textareaContent">Текстовое поле:</label>
    <textarea id="textareaContent" name="textareaContent" rows="4" ></textarea>

    <input type="submit" value="Отправить">
</form>
<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $inputNumber = $_POST["inputNumber"];
    $selectOption = $_POST["selectOption"];
    $textareaContent = $_POST["textareaContent"];

    // Проверяем, чтобы поля были заполнены
    if (empty($inputNumber) || empty($selectOption) || empty($textareaContent)) {
        echo "Please fill in all required fields.";
    } else {
        // Выводим данные
        ?>
            <div style="display: flex; flex-direction: column; margin-left: 15px; justify-content: flex-start;
             align-items: flex-start; text-align: left;">
        <p>Введенное число: <?php echo $inputNumber;?><br></p>
        <p>Выбранная опция: <?php echo $selectOption;?><br></p>
        <p>Текстовое поле: <?php echo $textareaContent;?><br></p>
            </div>
        <?php
    }
}
?>
</body>
</html>

<?php