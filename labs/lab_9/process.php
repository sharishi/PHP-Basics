<?php
include 'index.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$comment = $_POST['comment'];

$query = "INSERT INTO users (name, surname, email) VALUES ('$name', '$surname', '$email')";
$stmt = $conn->prepare($query);
$stmt->execute();

$user_id = $conn->lastInsertId();

$query = "INSERT INTO comments (user_id, comment) VALUES ('$user_id', '$comment')";
$stmt = $conn->prepare($query);
$stmt->execute();

header('Location: add_data.php');
