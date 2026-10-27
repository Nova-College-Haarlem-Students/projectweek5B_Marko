<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("UPDATE diensten SET deleted_at = NULL WHERE dienst_id = :id");
$stmt->execute(['id' => $id]);

// logboek
$stmt = $conn->prepare("INSERT INTO logboek (user_id, actie) VALUES (:user_id, :actie)");
$stmt->execute(['user_id' => $_SESSION['user_id'], 'actie' => "Dienst $id teruggezet"]);

header("Location: diensten_index.php");
exit;
