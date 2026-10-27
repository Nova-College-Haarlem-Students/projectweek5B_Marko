<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM diensten WHERE dienst_id = :id");
$stmt->execute(['id' => $id]);
$dienst = $stmt->fetch(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail">
        <h2>Dienst wijzigen</h2>

        <form action="diensten_update_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dienst['dienst_id'] ?>">
            <p>
                <label for="naam">Naam</label>
                <input type="text" id="naam" name="naam" value="<?php echo $dienst['naam'] ?>">
            </p>
            <p>
                <label for="omschrijving">Omschrijving</label>
                <textarea id="omschrijving" name="omschrijving"><?php echo $dienst['omschrijving'] ?></textarea>
            </p>
            <p>
                <label for="duur">Duur (minuten)</label>
                <input type="number" id="duur" name="duur_minuten" value="<?php echo $dienst['duur_minuten'] ?>">
            </p>
            <p>
                <label for="prijs">Prijs</label>
                <input type="number" step="0.01" id="prijs" name="prijs" value="<?php echo $dienst['prijs'] ?>">
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>
