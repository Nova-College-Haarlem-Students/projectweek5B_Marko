<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

$naam = $_POST['naam'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($naam == "" || $email == "" || $password == "") {
    echo "Vul alle velden in";
    exit;
}

require 'database.php';

// rol 1 = klant (de rol komt nooit uit het formulier)
$stmt = $conn->prepare("INSERT INTO users (role_id, naam, email, wachtwoord) VALUES (1, :naam, :email, :wachtwoord)");
$stmt->execute([
    'naam' => $naam,
    'email' => $email,
    'wachtwoord' => password_hash($password, PASSWORD_DEFAULT)
]);

header("Location: login.php");
exit;
