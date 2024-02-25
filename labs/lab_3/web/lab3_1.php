<?php
// ex 1.1
$a = 0;
$b = 0;

// Функция try_for с использованием цикла for
function try_for($a, $b)
{
    echo "<br />Изначальное значение a = " . $a . " и изначальное значение b = " . $b;
    for ($i = 0; $i <= 5; $i++) {
        $a += 10;
        $b += 5;
        echo "<br />Промежуточное значение a = " . $a . " и промежуточное значение b = " . $b;
    }
    echo "<br />Конец цикла, и значение a = " . $a . ", а значение b = " . $b;
}

// Вызов функции try_for
try_for($a, $b);

//ex 1.2
// Функция try_while с использованием цикла while
function try_while($a, $b)
{
    $i = 0;
    echo "<br />Изначальное значение a = " . $a . " и изначальное значение b = " . $b;
    while ($i <= 5) {
        $a += 10;
        $b += 5;
        echo "<br />Промежуточное значение a = " . $a . " и промежуточное значение b = " . $b;
        $i++;
    }
    echo "<br />Конец цикла, и значение a = " . $a . ", а значение b = " . $b;
}

// Вызов функции try_while
try_while($a, $b);

//ex 1.3
// Функция generate_random_array для генерации массива случайных чисел и его вывода
function generate_random_array()
{
    $arr = [];
    $random_number = rand(1, 2);
    $random_dimension = rand(3, 10);

    // Ветвление на основе случайного числа для выбора типа цикла
    if ($random_number == 1) { ?>
        <br /><br />Hi, I'm using for<br />
        <?php
        for ($i = 0; $i <= $random_dimension; $i++) {
            $arr[$i] = rand(1, 100);
        }
    } else {
        $i = 0;
        echo "<br /><br />Hi, I'm using while<br />";
        while ($i <= $random_dimension) {
            $arr[$i] = rand(1, 100);
            $i++;
        }
    }

    // Вывод сгенерированного массива
    print_r($arr);
}

// Вызов функции generate_random_array
generate_random_array();

