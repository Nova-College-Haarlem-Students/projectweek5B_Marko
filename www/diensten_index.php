<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM diensten WHERE deleted_at IS NULL");
$stmt->execute();
$diensten = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Alle diensten</h2>
        <a href="diensten_create.php" class="knop">Nieuwe dienst</a>
        <a href="diensten_uitgezet.php" class="knop">Uitgezette diensten</a>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Duur</th>
                    <th>Prijs</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diensten as $dienst) : ?>
                    <tr>
                        <td><?php echo $dienst['naam'] ?></td>
                        <td><?php echo $dienst['duur_minuten'] ?> min</td>
                        <td>&euro; <?php echo $dienst['prijs'] ?></td>
                        <td>
                            <a href="diensten_detail.php?id=<?php echo $dienst['dienst_id'] ?>">Bekijk</a>
                            <a href="diensten_wijzig.php?id=<?php echo $dienst['dienst_id'] ?>">Wijzig</a>
                            <a href="diensten_softdelete.php?id=<?php echo $dienst['dienst_id'] ?>">Uitzetten</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require 'footer.php' ?>
