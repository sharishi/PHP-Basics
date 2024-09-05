<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя веб-страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #0d7040;
            color: #a8bd94;
            padding: 10px 0;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #0d7040;
            color: #a8bd94;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<?php
require "views/components/header.php"
?>

<main>
<?php
require "views/components/form.php";
//require "views/components/comments.php";
require "views/components/Part.php";
Part::part('views/components/comments'); ?>
</main>
<?php
require "views/components/footer.php"
?>

</body>
</html>

