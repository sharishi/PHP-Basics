<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовая форма</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 450px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 128, 0, 0.3);
            box-sizing: border-box;
        }

        label {
            display: flex;
            flex-direction: column;
        }

        input[type="checkbox"],
        input[type="radio"]{
            padding: 10px;
            margin: 0;
            box-sizing: border-box;
            border: 1px solid #ead6d6;
            border-radius: 2px;
            gap: 10px;
        }

        input[type="text"], textarea ,
        select {
            width: 100%;
            height: 30px;
            /*vertical-align: middle;*/
            /*margin-top: 0; !* Reset margin-top for radio and checkbox *!*/
        }

        /* Основной стиль кнопки */
        input[type="submit"] {
            background-color: #4CAF50; /* Зеленый цвет */
            color: #ffffff; /* Белый цвет текста */
            padding: 10px 20px; /* Отступы внутри кнопки */
            border: none; /* Убираем границу */
            border-radius: 5px; /* Закругляем углы */
            cursor: pointer;
            font-size: 16px; /* Размер шрифта */
        }

        /* Стиль при наведении на кнопку */
        input[type="submit"]:hover {
            background-color: #45a049; /* Темно-зеленый цвет при наведении */
        }


        p {
            font-weight: bold;
            padding: 5px;
        }
    </style>

</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username" style="font-weight: bold;">Enter your name:</label>
    <input type="text" name="username" required><br><br>

    <p>Question 1: What currency is used in Japan?</p>
    <div style="display: flex; flex-direction: column;">
        <div style="display: flex; flex-direction: row;">
            <input id="first" type="radio" name="question1" value="Japanese dollar"> <label for="first">Japanese dollar</label></div>
        <div style="display: flex; flex-direction: row;">
            <input id="first" type="radio" name="question1" value="Yen"> Yen
        </div>
        <div style="display: flex; flex-direction: row;">
            <input id="first" type="radio" name="question1" value="Yuan"> Yuan
        </div>
    </div>
    <br><br>
    <p>Question 2: Which bone is the longest bone in your body?</p>
    <div style="display: flex; flex-direction: column;">
        <div style="display: flex; flex-direction: row;">
            <input type="checkbox" name="question2[]" value="Humerus"> Humerus
        </div>
        <div style="display: flex; flex-direction: row;">
            <input type="checkbox" name="question2[]" value="Tibia"> Tibia
        </div>
        <div style="display: flex; flex-direction: row;">
            <input type="checkbox" name="question2[]" value="Femur"> Femur
        </div>
        <div style="display: flex; flex-direction: row;">
            <input type="checkbox" name="question2[]" value="Talus"> Talus
        </div>
    </div>
    <br><br>

    <p>Question 3: What was the name of the Egyptian God of knowledge and wisdom?</p>
    <select name="question3">
        <option value="" selected disabled>Select an option</option>
        <option value="comedy">Osiris</option>
        <option value="horrors">Thoth</option>
        <option value="fantasy">Ra</option>
        <option value="mysticism">Anubis</option>
        <option value="militant">Seth</option>
    </select><br><br>

    <input type="submit" value="Send">
</form>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $username = htmlspecialchars($_POST["username"]);
    $question1 = isset($_POST["question1"]) ? $_POST["question1"] : "";
    $question2 = isset($_POST["question2"]) ? $_POST["question2"] : [];
    $question3 = isset($_POST["question3"]) ? $_POST["question3"] : "";

    // Правильные ответы
    $correct_answers = [
        'question1' => 'Yen',
        'question2' => 'Femur',
        'question3' => 'Thoth',
    ];

    // Вывод результатов
    echo "<h2>Test results:</h2>";
    echo "<p>User Name: $username</p>";

    foreach ($correct_answers as $question => $correct_answer) {
        echo "<p>Response to $question: ";
        $user_answer = isset($_POST[$question]) ? $_POST[$question] : "";

        if (!empty($user_answer)) {
            if (is_array($user_answer)) {
                $user_answer = implode(", ", $user_answer);
            }

            if ($user_answer === $correct_answer) {
                echo "<span style='color:green;'>Correct</span>: $user_answer";
            } else {
                echo "<span style='color:red;'>Incorrect</span>: $user_answer (Correct answer: $correct_answer)";
            }
        } else {
            echo "<span style='color:red;'>Not noted</span>";
        }

        echo "</p>";
    }
}




