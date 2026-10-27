<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$id = $_GET['id'];

// niet echt verwijderen, alleen een datum invullen
$stmt = $conn->prepare("UPDATE diensten SET deleted_at = NOW() WHERE dienst_id = :id");
$stmt->execute(['id' => $id]);

// logboek
$stmt = $conn->prepare("INSERT INTO logboek (user_id, actie) VALUES (:user_id, :actie)");
$stmt->execute(['user_id' => $_SESSION['user_id'], 'actie' => "Dienst $id uitgezet"]);

header("Location: diensten_index.php");
exit;
