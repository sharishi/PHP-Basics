<?php
//создание файла
//$file = fopen("file.txt", "w") or die("Ошибка создания файла!");
////Вводим данные в файл
//fwrite($file, "1. William Smith, 1990, 2344455666677\n");
//fwrite($file, "2. John Doe, 1988, 4445556666787\n");
//fwrite($file, "3. Michael Brown, 1991, 7748956996777\n");
//fwrite($file, "4. David Johnson, 1987, 5556667779999\n");
//fwrite($file, "5. Robert Jones, 1992, 99933456678888\n");
////Закрываем файл
//fclose($file);
//Открываем файл для добавления данных
$file = fopen("../files/file.txt", "a") or die("Error opening for adding data!");
if (!$file) {
    echo("No file was found to add data!");
} else {
    // Добавьте в файл с помощью функции fwrite() еще 3 записи
    fwrite($file, "6. Lexy Lensa, 1997, 8753983985847\n");
    fwrite($file, "7. Ann Noan, 1956, 9087385610392\n");
    fwrite($file, "8. Sofi Cat, 1999, 4627891047984\n");
}
fclose($file);
//Открываем файл для чтения из него
$file = fopen("../files/file.txt", "r") or die("Error opening a file for reading!");
if (!$file) {
    echo("No file was found to read the data!");
} else {?>
    <div>Data from file: </div>
    <?php
    while (!feof($file)) {
        echo fgets($file); ?>
        <br/>
        <?php
    }
    fclose($file);
}

