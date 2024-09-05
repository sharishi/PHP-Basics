<?php
/**
 * Sanitizes the given data.
 * @param string $data The data to sanitize.
 * @return string The sanitized data.
 */
function sanitizeData(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

$errors = [];
if ($_REQUEST["register"]) {
    // Валидация данных
    if (empty($_POST['login'])) {
        $errors['login'][] = 'Enter a name!';
    }
    if (empty($_POST['password'])) {
        $errors['password'][] = 'Enter your password!';
    }
    // Добавьте другие проверки
    if (count($errors) === 0) {
        $data = [
            'name' => sanitizeData($_POST['login']),
            'password' => md5(sanitizeData($_POST['password']))
        ];
        $log = fopen("../files/users.txt", "a+") or die("Unavailable file!");
        $ifExist = false;
        while (!feof($log)) {
            $line = trim(fgets($log));
            if (strpos($line, $data['name']) !== false) {
                $ifExist = true;
                $errors['login'][] = 'A user with this name already exists!';
                break;
            }
        }
        if (!$ifExist) {
            $log = fopen("../files/users.txt", "a+") or die("Unavailable file!");
            // Сохраняем данные пользователя в файл
            if (fwrite($log, $data['name'] . ':' . $data['password'] . PHP_EOL)) {
                // Если данные успешно записаны, выводим сообщение об успешной регистрации
                echo "Registration successful!";
            } else {
                // Если произошла ошибка при записи данных в файл, выводим сообщение об ошибке
                echo "Error during registration. Please try again later.";
            }
        }
        fclose($log);
    } else {
        // Вывести ошибки валидации
        foreach ($errors as $field => $error) {
            echo implode("<br>", $error);
        }
    }
}

?>

<div>
    <h2>Registration</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label>
            <span>Name</span>
            <input name="login" value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>">
            <?php if (isset($errors["login"])) : ?>
                <?php foreach ($errors["login"] as $error) : ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </label>
        <label>
            <span>Password</span>
            <input type="password" name="password">
        </label>
        <input type="submit" name="register" value="Register">
    </form>
</div>



