<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM afspraken WHERE afspraak_id = :id");
$stmt->execute(['id' => $id]);
$afspraak = $stmt->fetch(PDO::FETCH_ASSOC);

// alle medewerkers (role_id 2 = medewerker)
$stmt = $conn->prepare("SELECT * FROM users WHERE role_id = 2");
$stmt->execute();
$medewerkers = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail">
        <h2>Afspraak wijzigen</h2>

        <form action="beheer_afspraken_update_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $afspraak['afspraak_id'] ?>">
            <p>
                <label for="monteur">Monteur</label>
                <select id="monteur" name="monteur_id">
                    <option value="">Nog niet toegewezen</option>
                    <?php foreach ($medewerkers as $medewerker) : ?>
                        <option value="<?php echo $medewerker['user_id'] ?>"><?php echo $medewerker['naam'] ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="kilometerstand">Kilometerstand</label>
                <input type="number" id="kilometerstand" name="kilometerstand" value="<?php echo $afspraak['kilometerstand'] ?>">
            </p>
            <p>
                <label for="opmerking">Opmerking</label>
                <textarea id="opmerking" name="opmerking"><?php echo $afspraak['opmerking'] ?></textarea>
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>
