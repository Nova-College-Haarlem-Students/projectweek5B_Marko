<?php
require 'session_check.php';

if ($_SESSION['role'] != 'klant') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

// mijn auto's
$stmt = $conn->prepare("SELECT * FROM autos WHERE user_id = :user_id");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$autos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// diensten
$stmt = $conn->prepare("SELECT * FROM diensten WHERE deleted_at IS NULL");
$stmt->execute();
$diensten = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail">
        <h2>Afspraak maken</h2>

        <form action="afspraken_create_process.php" method="post">
            <p>
                <label for="auto">Auto</label>
                <select id="auto" name="auto_id">
                    <?php foreach ($autos as $auto) : ?>
                        <option value="<?php echo $auto['auto_id'] ?>"><?php echo $auto['kenteken'] ?> - <?php echo $auto['merk'] ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="dienst">Dienst</label>
                <select id="dienst" name="dienst_id">
                    <?php foreach ($diensten as $dienst) : ?>
                        <option value="<?php echo $dienst['dienst_id'] ?>"><?php echo $dienst['naam'] ?> (&euro; <?php echo $dienst['prijs'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="datum">Datum</label>
                <input type="date" id="datum" name="datum">
            </p>
            <p>
                <label for="tijd">Tijd</label>
                <select id="tijd" name="tijd">
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </p>
            <button type="submit" class="knop">Afspraak maken</button>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>
