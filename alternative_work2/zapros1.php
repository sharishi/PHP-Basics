<?php

try {
    require_once 'connect.php';

    $queryFaculty = "INSERT INTO facultate (denumire_facultate, nr_telefon_secretar)
                     VALUES ('Fizica', '+37379125467')";
    $connect->exec($queryFaculty);

    $queryMajor = "INSERT INTO specialitate (denumire_specialitate, durata_specialitate,id_facultate)
                   VALUES ('Inginerie', 4, 1)";
    $connect->exec($queryMajor);

    $queryFaculty2 = "INSERT INTO facultate (denumire_facultate, nr_telefon_secretar)
                      VALUES ('Matematica', '+37378453288')";
    $connect->exec($queryFaculty2);

    $queryMajor2 = "INSERT INTO specialitate (denumire_specialitate, durata_specialitate,id_facultate)
                    VALUES ('Informatica', 3, 2)";
    $connect->exec($queryMajor2);
    echo "Данные успешно добавлены в таблицы facultate и specialitate";
} catch (PDOException $e) {
    die("Ошибка при выполнении запросов: " . $e->getMessage());
}





