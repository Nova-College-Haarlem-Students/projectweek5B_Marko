<?php
session_start();
require 'database.php';

// sorteren
$sql = "SELECT * FROM diensten WHERE deleted_at IS NULL ORDER BY naam";

if (isset($_GET['sorteer'])) {
    if ($_GET['sorteer'] == 'prijs_op') {
        $sql = "SELECT * FROM diensten WHERE deleted_at IS NULL ORDER BY prijs ASC";
    }
    if ($_GET['sorteer'] == 'prijs_af') {
        $sql = "SELECT * FROM diensten WHERE deleted_at IS NULL ORDER BY prijs DESC";
    }
    if ($_GET['sorteer'] == 'duur_op') {
        $sql = "SELECT * FROM diensten WHERE deleted_at IS NULL ORDER BY duur_minuten ASC";
    }
    if ($_GET['sorteer'] == 'duur_af') {
        $sql = "SELECT * FROM diensten WHERE deleted_at IS NULL ORDER BY duur_minuten DESC";
    }
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$diensten = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <form method="GET" class="filter">
        <h2>Sorteren</h2>
        <button type="submit" name="sorteer" value="prijs_op">Prijs laag &rarr; hoog</button>
        <button type="submit" name="sorteer" value="prijs_af">Prijs hoog &rarr; laag</button>
        <button type="submit" name="sorteer" value="duur_op">Duur kort &rarr; lang</button>
        <button type="submit" name="sorteer" value="duur_af">Duur lang &rarr; kort</button>
    </form>

    <h2>Onze diensten</h2>

    <div class="diensten">
        <?php foreach ($diensten as $dienst) : ?>
            <div class="dienst">
                <h3><?php echo $dienst['naam'] ?></h3>
                <p><?php echo $dienst['omschrijving'] ?></p>
                <p>Duur: <?php echo $dienst['duur_minuten'] ?> minuten</p>
                <p class="prijs">&euro; <?php echo $dienst['prijs'] ?></p>
                <a href="diensten_detail.php?id=<?php echo $dienst['dienst_id'] ?>" class="knop">Bekijk details</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require 'footer.php' ?>
