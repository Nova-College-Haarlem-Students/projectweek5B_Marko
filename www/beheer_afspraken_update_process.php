<?php
require 'session_check.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

$id = $_POST['id'];
$monteur_id = $_POST['monteur_id'];
$kilometerstand = $_POST['kilometerstand'];
$opmerking = $_POST['opmerking'];

// leeg = NULL in de database
if ($monteur_id == "") {
    $monteur_id = null;
}
if ($kilometerstand == "") {
    $kilometerstand = null;
}
if ($opmerking == "") {
    $opmerking = null;
}

require 'database.php';

$stmt = $conn->prepare("UPDATE afspraken SET monteur_id = :monteur_id, kilometerstand = :kilometerstand, opmerking = :opmerking WHERE afspraak_id = :id");
$stmt->execute([
    'monteur_id' => $monteur_id,
    'kilometerstand' => $kilometerstand,
    'opmerking' => $opmerking,
    'id' => $id
]);

// logboek
$stmt = $conn->prepare("INSERT INTO logboek (user_id, actie) VALUES (:user_id, :actie)");
$stmt->execute(['user_id' => $_SESSION['user_id'], 'actie' => "Afspraak $id gewijzigd"]);

header("Location: beheer_afspraken_index.php");
exit;
