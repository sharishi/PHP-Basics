<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма комментариев</title>
    <style>
        #my-shop {
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

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
        .button-container {
            text-align: center;
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
        #aId a {
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


        .button-container a:hover {
            background-color: #f5caca;
            color: #576b58;
        }
    </style>
</head>
<body>
<div id="write-comment">
    <div id="my-shop">
        <nav>
            <div class="button-container">
                <a id="aId" style="margin-right: 550px" href="#">#myshop</a>
                <a href="#">Home</a>
                <a href="#">Comments</a>
                <a style="margin-left: 500px" href="#">Exit</a>
            </div>

        </nav>
    </div>
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
// Instantiate the Validator class
$validator = new Validator();

$validator->addValidation('name', function ($name) {
    return strlen($name) >= 3 and strlen($name) <= 20 and !preg_match('/\d/', $name);
}, 'Name must be between 3 and 20 characters and should not contain digits.');

$validator->addValidation('email', function ($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}, 'Invalid email address.');

$validator->addValidation('comment', function ($comment) {
    return !empty($comment) && strlen($comment) >= 10;
}, 'Comment should not be empty and have a minimum length of 10 characters.');

$validator->addValidation('data-processing', function ($dataProcessing) {
    return !empty($dataProcessing);
}, 'You must agree with data processing.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formData = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'comment' => $_POST['comment'],
        'data-processing' => isset($_POST['data-processing']),
    ];

    $errors = $validator->validateForm($formData);
    if (!empty($errors)) {
        echo '<p>We have a problem! 😘</p>';
        print_r($errors);
    } else {
        echo '<p>Thank you for your comment! 😘</p>';
    }
}
