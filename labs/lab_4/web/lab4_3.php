<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма комментариев</title>
    <style>


        nav {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: right;
        }

        nav a {
            margin-right: 10px;
            text-decoration: none;
            color: #333;
        }

        #write-comment {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        .header {
            background-color: #ccc;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 40%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


        .button-container a {
            display: inline-block;
            padding: 5px 5px;
            margin: 5px;
            text-decoration: none;
            background-color: #b1b7b1;
            color: #1f1919;
            border: 1px solid #c0bbbb;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .logo {
            font-weight: bold;
        }

        .navigation {
            display: flex;
            flex-grow: 1;
            justify-content: center;
        }

        .nav-item {
            margin-right: 20px;
            cursor: pointer;
            padding: 5px 10px;
            background-color: grey;
            color: #1f1919;
            text-decoration: none;
            border-radius: 5px;
        }
        .navigation a:hover {
            background-color: #f5caca;
            color: #576b58;
        }
    </style>
</head>
<body>
    <div id="write-comment">
        <div class="header">
            <div class="logo">#my-shop</div>
            <div class="navigation">
                <a href="#" class="nav-item">Home</a>
                <a href="#" class="nav-item">Comments</a>
            </div>
            <div class="nav-item">Exit</div>
        </div>
        <a style="font-size: 40px; font-weight: bold">#write comment</a>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" >

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" ></textarea>
        <div style="display: flex; flex-direction: row;">
            <input type="checkbox" id="data-processing" name="data-processing" >
            <label for="data-processing">Do you agree with data processing?</label>
        </div>
            <button type="submit">Send</button>
        </form>
    </div>

</body>
</html>

<?php

function validateForm($name, $email, $comment, $dataProcessing) {
    $errors = [];

    if (strlen($name) < 3 or strlen($name) > 20 or preg_match('/\d/', $name)) {
        $errors['name'] = 'Name must be between 3 and 20 characters and should not contain digits.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email address.';
    }

    if (empty($comment) and strlen($comment) < 10) {
        $errors['comment'] = 'Comment should not be empty and more widespread';
    }

    if (empty($dataProcessing)) {
        $errors['data_processing'] = 'You must agree with data processing.';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $dataProcessing = isset($_POST['data-processing']);

    $errors = validateForm($name, $email, $comment, $dataProcessing);

    if (empty($errors)) {
        echo '<p>Thank you for your comment!😘</p>';
    } else {
        // Вывод формы с сообщениями об ошибках
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
}
