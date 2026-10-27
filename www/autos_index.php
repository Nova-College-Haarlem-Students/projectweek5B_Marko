<?php
require 'session_check.php';

if ($_SESSION['role'] != 'klant') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM autos WHERE user_id = :user_id");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$autos = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Mijn auto's</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Kenteken</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Bouwjaar</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autos as $auto) : ?>
                    <tr>
                        <td><?php echo $auto['kenteken'] ?></td>
                        <td><?php echo $auto['merk'] ?></td>
                        <td><?php echo $auto['model'] ?></td>
                        <td><?php echo $auto['bouwjaar'] ?></td>
                        <td><a href="autos_wijzig.php?id=<?php echo $auto['auto_id'] ?>">Wijzig</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="autos_create.php" class="knop">Auto toevoegen</a>
    </div>
</main>

<?php require 'footer.php' ?>
