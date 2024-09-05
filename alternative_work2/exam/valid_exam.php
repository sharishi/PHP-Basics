<?php

function clean_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

$person_errors = array(
    "person_name" => "",
    "person_surname" => "",
    "address" => "",
    "person_email" => "",
    "telephone_number" => "",
    "postal_code" => "",

);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $person_name = clean_data($_POST["person_name"]);
    if (empty($person_name)) {
        $person_errors["person_name"] = "Fill in the field!";
    }

    $person_surname = clean_data($_POST["person_surname"]);
    if (empty($person_surname)) {
        $person_errors["person_surname"] = "Fill in the field!";
    }

    $address = clean_data($_POST["address"]);
    if (empty($address)) {
        $person_errors["address"] = "Fill in the field!";
    }

    $person_email = clean_data($_POST["person_email"]);
    if (empty($person_email)) {
        $person_errors["person_email"] = "Fill in the field!";
    } elseif (!filter_var($person_email, FILTER_VALIDATE_EMAIL)) {
        $person_errors["person_email"] = "Incorrect email address!";
    }

    $telephone_number = clean_data($_POST["telephone_number"]);
    if (empty($telephone_number)) {
        $errors["telephone_number"] = "Fill in the field!";
    } elseif (!ctype_digit($telephone_number)) {
        $errors["telephone_number"] = "Enter only digits!";
    }

    $postal_code = clean_data($_POST["postal_code"]);
    if (empty($telephone_number)) {
        $errors["postal_code"] = "Fill in the field!";
    } elseif (!preg_match("/^[A-Z]{2}[0-9]{4}$/", $postal_code)) {
        $errors["postal_code"] ="Postal Code must be in the format: AA1234";
    }


    if (!array_filter($person_errors)) {
        require('connect_exam.php');

        $sql = "INSERT INTO student (client_surname, client_firstname, client_address, postal_code, phone_number, email) 
            VALUES (:person_surname, :person_name, :address, :postal_code, :telephone_number, :person_email)";
        $stmt = $connect->prepare($sql);

        $stmt->bindParam(':person_surname', $person_surname);
        $stmt->bindParam(':person_name', $person_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':telephone_number', $telephone_number);
        $stmt->bindParam(':person_email', $person_email);


        $stmt->execute();
        $stmt->closeCursor();
        $connect = null;

        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/index.php');
        exit();
    }


}



