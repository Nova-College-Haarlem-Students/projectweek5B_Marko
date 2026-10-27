<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM diensten WHERE deleted_at IS NOT NULL");
$stmt->execute();
$diensten = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Uitgezette diensten</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Uitgezet op</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diensten as $dienst) : ?>
                    <tr>
                        <td><?php echo $dienst['naam'] ?></td>
                        <td><?php echo $dienst['deleted_at'] ?></td>
                        <td><a href="diensten_restore.php?id=<?php echo $dienst['dienst_id'] ?>">Terugzetten</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="diensten_index.php" class="knop">Terug</a>
    </div>
</main>

<?php require 'footer.php' ?>
