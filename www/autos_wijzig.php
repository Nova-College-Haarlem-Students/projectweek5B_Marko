<?php
require 'session_check.php';

if ($_SESSION['role'] != 'klant') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM autos WHERE auto_id = :id");
$stmt->execute(['id' => $id]);
$auto = $stmt->fetch(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail">
        <h2>Auto wijzigen</h2>

        <form action="autos_update_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $auto['auto_id'] ?>">
            <p>
                <label for="kenteken">Kenteken</label>
                <input type="text" id="kenteken" name="kenteken" value="<?php echo $auto['kenteken'] ?>">
            </p>
            <p>
                <label for="merk">Merk</label>
                <input type="text" id="merk" name="merk" value="<?php echo $auto['merk'] ?>">
            </p>
            <p>
                <label for="model">Model</label>
                <input type="text" id="model" name="model" value="<?php echo $auto['model'] ?>">
            </p>
            <p>
                <label for="bouwjaar">Bouwjaar</label>
                <input type="number" id="bouwjaar" name="bouwjaar" value="<?php echo $auto['bouwjaar'] ?>">
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>
