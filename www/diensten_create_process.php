<?php
require 'session_check.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

$naam = $_POST['naam'];
$omschrijving = $_POST['omschrijving'];
$duur = $_POST['duur_minuten'];
$prijs = $_POST['prijs'];

if ($naam == "" || $duur == "" || $prijs == "") {
    echo "Vul alle velden in";
    exit;
}

require 'database.php';

$stmt = $conn->prepare("INSERT INTO diensten (naam, omschrijving, duur_minuten, prijs) VALUES (:naam, :omschrijving, :duur, :prijs)");
$stmt->execute([
    'naam' => $naam,
    'omschrijving' => $omschrijving,
    'duur' => $duur,
    'prijs' => $prijs
]);

// logboek
$stmt = $conn->prepare("INSERT INTO logboek (user_id, actie) VALUES (:user_id, :actie)");
$stmt->execute(['user_id' => $_SESSION['user_id'], 'actie' => "Dienst $naam toegevoegd"]);

header("Location: diensten_index.php");
exit;
