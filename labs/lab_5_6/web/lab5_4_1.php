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

// Authentication process
if (isset($_POST["auth"])) {
    // Сохранение данных в массив $data
    $data = [
        'login' => sanitizeData($_POST['login']),
        'password' => sanitizeData($_POST['password']),
    ];
    // Проверка данных
    $log = fopen("../files/users.txt", "r") or die("Unavailable file!");
    $ifExist = false;
    while (!feof($log)) {
        $line = trim(fgets($log));
        $line = explode(":", $line);
        if ($line[0] === $data['login']) {
            $ifExist = true;
            if (md5($data['password']) === $line[1]) {
                fclose($log);
                header("Location: ../../lab_3/web/lab3_4.php");
                exit; // Exit after redirect
            } else {
                $errors['auth'][] = 'Invalid user name or password!';
                break;
            }
        }
    }
    // Действия, если пользователь не найден
    if (!$ifExist) {
        $errors['auth'][] = 'User not found!';
    }
    fclose($log);
}

?>

<div>
    <h2>Authentication</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label>
            <span>Name</span>
            <input name="login" value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : ''; ?>">
        </label>
        <label>
            <span>Password</span>
            <input type="password" name="password">
            <!-- Add error message here if needed -->
        </label>
        <input type="submit" name="auth" value="Login">
        <?php if (!empty($errors['auth'])): ?>
            <div style="color: red;">
                <?php foreach ($errors['auth'] as $error): ?>
                    <?php echo $error; ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </form>
</div>
