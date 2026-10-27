<?php
require 'session_check.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

$auto_id = $_POST['auto_id'];
$dienst_id = $_POST['dienst_id'];
$datum = $_POST['datum'];
$tijd = $_POST['tijd'];

if ($datum == "") {
    echo "Kies een datum";
    exit;
}

require 'database.php';

// prijs van de dienst ophalen, zodat die bewaard blijft bij de afspraak
$stmt = $conn->prepare("SELECT prijs FROM diensten WHERE dienst_id = :id");
$stmt->execute(['id' => $dienst_id]);
$dienst = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("INSERT INTO afspraken (auto_id, dienst_id, datum, tijd, prijs) VALUES (:auto_id, :dienst_id, :datum, :tijd, :prijs)");
$stmt->execute([
    'auto_id' => $auto_id,
    'dienst_id' => $dienst_id,
    'datum' => $datum,
    'tijd' => $tijd,
    'prijs' => $dienst['prijs']
]);

header("Location: dashboard.php");
exit;
