<?php
require 'session_check.php';

if ($_SESSION['role'] != 'klant') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

// mijn afspraken
$stmt = $conn->prepare("SELECT afspraken.*, autos.kenteken, diensten.naam AS dienst
                        FROM afspraken
                        LEFT JOIN autos ON afspraken.auto_id = autos.auto_id
                        LEFT JOIN diensten ON afspraken.dienst_id = diensten.dienst_id
                        WHERE autos.user_id = :user_id");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$afspraken = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Mijn afspraken</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Kenteken</th>
                    <th>Dienst</th>
                    <th>Prijs</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($afspraken as $afspraak) : ?>
                    <tr>
                        <td><?php echo $afspraak['datum'] ?></td>
                        <td><?php echo $afspraak['tijd'] ?></td>
                        <td><?php echo $afspraak['kenteken'] ?></td>
                        <td><?php echo $afspraak['dienst'] ?></td>
                        <td>&euro; <?php echo $afspraak['prijs'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="afspraken_create.php" class="knop">Nieuwe afspraak</a>
    </div>
</main>

<?php require 'footer.php' ?>
