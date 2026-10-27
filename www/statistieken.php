<?php
require 'session_check.php';

if ($_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken, alleen de admin";
    exit;
}

require 'database.php';

// aantal afspraken en omzet per dienst
$stmt = $conn->prepare("SELECT diensten.naam, COUNT(afspraken.afspraak_id) AS aantal, SUM(afspraken.prijs) AS omzet
                        FROM diensten
                        LEFT JOIN afspraken ON diensten.dienst_id = afspraken.dienst_id
                        GROUP BY diensten.dienst_id");
$stmt->execute();
$perDienst = $stmt->fetchAll(PDO::FETCH_ASSOC);

// gemiddelde prijs per afspraak
$stmt = $conn->prepare("SELECT AVG(prijs) AS gemiddeld FROM afspraken");
$stmt->execute();
$gemiddeld = $stmt->fetch(PDO::FETCH_ASSOC);

// oudste en nieuwste auto
$stmt = $conn->prepare("SELECT MIN(bouwjaar) AS oudste, MAX(bouwjaar) AS nieuwste FROM autos");
$stmt->execute();
$bouwjaar = $stmt->fetch(PDO::FETCH_ASSOC);

// merken met meer dan 2 auto's
$stmt = $conn->prepare("SELECT merk, COUNT(*) AS aantal FROM autos GROUP BY merk HAVING COUNT(*) > 2");
$stmt->execute();
$merken = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <h2>Statistieken</h2>

    <div class="cijfers">
        <div class="cijfer">
            <h3>Gemiddelde prijs per afspraak</h3>
            <p>&euro; <?php echo round($gemiddeld['gemiddeld'], 2) ?></p>
        </div>
        <div class="cijfer">
            <h3>Oudste auto</h3>
            <p><?php echo $bouwjaar['oudste'] ?></p>
        </div>
        <div class="cijfer">
            <h3>Nieuwste auto</h3>
            <p><?php echo $bouwjaar['nieuwste'] ?></p>
        </div>
    </div>

    <div class="detail breed">
        <h2>Afspraken en omzet per dienst</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Dienst</th>
                    <th>Aantal afspraken</th>
                    <th>Omzet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perDienst as $rij) : ?>
                    <tr>
                        <td><?php echo $rij['naam'] ?></td>
                        <td><?php echo $rij['aantal'] ?></td>
                        <td>&euro; <?php echo $rij['omzet'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Merken met meer dan twee auto's</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Aantal auto's</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merken as $merk) : ?>
                    <tr>
                        <td><?php echo $merk['merk'] ?></td>
                        <td><?php echo $merk['aantal'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require 'footer.php' ?>
