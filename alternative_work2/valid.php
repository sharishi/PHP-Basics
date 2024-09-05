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
    "graduation_year" => "",
    "high_school_avg" => "",
    "image" => ""
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $person_name = clean_data($_POST["person_name"]);
    if (empty($person_name)) {
        $person_errors["person_name"] = "Fill in the field!";
    } elseif (!preg_match("/^[A-Z][a-z]{2,20}$/", $person_name)) {
        $person_errors["person_name"] = "First letter lowercase small trailing letters, enter 2 to 20!";
    }

    $person_surname = clean_data($_POST["person_surname"]);
    if (empty($person_surname)) {
        $person_errors["person_surname"] = "Fill in the field!";
    } elseif (!preg_match("/^[A-Z][a-z]{2,20}$/", $person_surname)) {
        $person_errors["person_surname"] = "First letter lowercase small trailing letters, enter 2 to 20!";
    }

    $address = clean_data($_POST["address"]);
    if (empty($address)) {
        $person_errors["address"] = "Fill in the field!";
    } elseif (!preg_match("/^[a-zA-Z0-9.,\s]{5,30}$/", $address)) {
        $person_errors["address"] = "Address consists of letters, numbers, separators (. ,) and space - enter 5 to 30 characters.";
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
    } elseif (strlen($telephone_number) < 6 || strlen($telephone_number) > 11) {
        $errors["telephone_number"] = "Enter between 6 and 11 digits!";
    } elseif (!ctype_digit($telephone_number)) {
        $errors["telephone_number"] = "Enter only digits!";
    }

    $graduation_year = clean_data($_POST["graduation_year"]);
    if (empty($graduation_year)) {
        $person_errors["graduation_year"] = "Fill in the field!";
    } elseif (!preg_match("/^(19[9][0-9]|20[0-1][0-9]|202[0-2])$/", $graduation_year)) {
        $person_errors["graduation_year"] = "Year of graduation - 4 digits (min. 1990 - max. 2022)!";
    }

    $high_school_avg = clean_data($_POST["high_school_avg"]);
    if (empty($high_school_avg)) {
        $person_errors["high_school_avg"] = "Fill in the field!";
    } elseif (!is_numeric($high_school_avg) || !preg_match("/^\d{1,4}(\.\d{1,2})?$/", $high_school_avg) || $high_school_avg <= 0) {
        $person_errors["high_school_avg"] = "Value is not a positive number or does not conform to the DECIMAL(4,2) format!";
    }

    $upload_directory = "img/";
    $file_name = $_FILES['image']['name'];
    $file_temp_name = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $accepted_extensions = array("jpg", "jpeg");

    if (empty($file_name)) {
        $person_errors["image"] = "Please upload an image.";
    } elseif (!in_array($file_extension, $accepted_extensions)) {
        $person_errors["image"] = "Acceptable file extensions are only jpg, jpeg";

    } elseif ($file_size > 5*1024*1024) {
        $person_errors["image"] = "File size is too large.";
    } else {
        $upload_file_path = $upload_directory . basename($file_name);
        if (!move_uploaded_file($file_temp_name, $upload_file_path)) {
            $person_errors["image"] = "Error uploading file.";
        }
    }


    if (!array_filter($person_errors)) {
        $id_speciality = $_POST["speciality"];
        require('connect.php');

        $sql = "INSERT INTO student (nume_student, prenume_student, adresa_domiciliu, nr_telefon, email, an_absolvire_liceu, media_liceu, id_specialitate, image_name) 
            VALUES (:person_name, :person_surname, :address, :telephone_number, :person_email, :graduation_year,:high_school_avg, :id_speciality, :file_name)";
        $stmt = $connect->prepare($sql);

        $stmt->bindParam(':person_name', $person_name);
        $stmt->bindParam(':person_surname', $person_surname);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':telephone_number', $telephone_number);
        $stmt->bindParam(':person_email', $person_email);
        $stmt->bindParam(':graduation_year', $graduation_year);
        $stmt->bindParam(':high_school_avg', $high_school_avg);
        $stmt->bindParam(':id_speciality', $id_speciality);
        $stmt->bindParam(':file_name', $file_name);


        $stmt->execute();
        $stmt->closeCursor();
        $connect = null;

        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/index.php');
        exit();
    }


}

