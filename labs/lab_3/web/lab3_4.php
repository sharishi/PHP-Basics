<?php
// Задаем путь к папке с изображениями
$dir = '../images/lab3_4/';
// Сканируем содержимое директории
// scandir — Получает список файлов и каталогов, расположенных по заданному пути
$files = scandir($dir);
// Если нет ошибок при сканировании
if ($files === false) {
    return;
}
// Вывод заголовка страницы с использованием HTML и стилизации

?>
<h1 style='font-size: 44px; color: goldenrod; text-transform: uppercase;text-align: center'>Golden palette</h1>
<!-- Открываем контейнер для изображений с использованием flexbox и стилизации-->
<div style="display: flex; flex-wrap: wrap; background-color: palegoldenrod; padding: 10px; min-height: 100vh;
 justify-content: center; align-items: center;">
<?php
// Итерация по файлам в директории
for ($i = 0;
$i < count($files);
$i++) {
// Проверка наличия файла или директории "." и ".."
if (($files[$i] != ".") && ($files[$i] != "..")) {
// Формируем полный путь к изображению
$path = $dir . $files[$i];
// Вывод HTML-кода для каждого изображения
    ?>
    <div style='margin: 10px; text-align: center; border: 1px solid grey; border-radius: 5px; overflow: hidden;'>
        <img src='<?php echo $path ?>' alt='Img' style='width: 300px; height: 250px; object-fit: cover;'>
    </div>

<?php
}
}
// Закрываем контейнер для изображений
?>
    </div>
<?php


