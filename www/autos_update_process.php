<?php
require 'session_check.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

$id = $_POST['id'];
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

$stmt = $conn->prepare("UPDATE autos SET kenteken = :kenteken, merk = :merk, model = :model, bouwjaar = :bouwjaar WHERE auto_id = :id");
$stmt->execute([
    'kenteken' => $kenteken,
    'merk' => $merk,
    'model' => $model,
    'bouwjaar' => $bouwjaar,
    'id' => $id
]);

header("Location: autos_index.php");
exit;
