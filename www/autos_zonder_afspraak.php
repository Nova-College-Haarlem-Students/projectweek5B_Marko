<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

// LEFT JOIN: auto's zonder afspraak hebben NULL bij afspraak_id
$stmt = $conn->prepare("SELECT autos.*
                        FROM autos
                        LEFT JOIN afspraken ON autos.auto_id = afspraken.auto_id
                        WHERE afspraken.afspraak_id IS NULL");
$stmt->execute();
$autos = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Auto's zonder afspraak</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Kenteken</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Bouwjaar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autos as $auto) : ?>
                    <tr>
                        <td><?php echo $auto['kenteken'] ?></td>
                        <td><?php echo $auto['merk'] ?></td>
                        <td><?php echo $auto['model'] ?></td>
                        <td><?php echo $auto['bouwjaar'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require 'footer.php' ?>
