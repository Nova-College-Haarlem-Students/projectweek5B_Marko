<?php
require 'session_check.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

$kenteken = $_POST['kenteken'];
$merk = $_POST['merk'];
$model = $_POST['model'];
$bouwjaar = $_POST['bouwjaar'];

if ($kenteken == "") {
    echo "Kenteken mag niet leeg zijn";
    exit;
}

if ($bouwjaar > date('Y')) {
    echo "Bouwjaar mag niet in de toekomst liggen";
    exit;
}

require 'database.php';

$stmt = $conn->prepare("INSERT INTO autos (user_id, kenteken, merk, model, bouwjaar) VALUES (:user_id, :kenteken, :merk, :model, :bouwjaar)");
$stmt->execute([
    'user_id' => $_SESSION['user_id'],
    'kenteken' => $kenteken,
    'merk' => $merk,
    'model' => $model,
    'bouwjaar' => $bouwjaar
]);

header("Location: autos_index.php");
exit;
