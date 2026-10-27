<?php
require 'session_check.php';
require 'database.php';

$naam = $_POST['naam'];
$email = $_POST['email'];

$stmt = $conn->prepare("UPDATE users SET naam = :naam, email = :email WHERE user_id = :id");
$stmt->execute([
    'naam' => $naam,
    'email' => $email,
    'id' => $_SESSION['user_id']
]);

header("Location: profile.php");
exit;
