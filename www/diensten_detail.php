<?php
session_start();
require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM diensten WHERE dienst_id = :id");
$stmt->execute(['id' => $id]);
$dienst = $stmt->fetch(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail">
        <?php if ($dienst) : ?>
            <h2><?php echo $dienst['naam'] ?></h2>
            <p><strong>Omschrijving:</strong> <?php echo $dienst['omschrijving'] ?></p>
            <p><strong>Duur:</strong> <?php echo $dienst['duur_minuten'] ?> minuten</p>
            <p><strong>Prijs:</strong> &euro; <?php echo $dienst['prijs'] ?></p>

            <a href="afspraken_create.php" class="knop">Afspraak maken</a>
            <a href="index.php" class="knop">Terug</a>
        <?php else : ?>
            <p>Dienst niet gevonden.</p>
        <?php endif; ?>
    </div>
</main>

<?php require 'footer.php' ?>
