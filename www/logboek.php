<?php
require 'session_check.php';

if ($_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken, alleen de admin";
    exit;
}

require 'database.php';

$stmt = $conn->prepare("SELECT logboek.*, users.naam
                        FROM logboek
                        LEFT JOIN users ON logboek.user_id = users.user_id
                        ORDER BY logboek.log_id DESC");
$stmt->execute();
$regels = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Logboek</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Wanneer</th>
                    <th>Medewerker</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regels as $regel) : ?>
                    <tr>
                        <td><?php echo $regel['created_at'] ?></td>
                        <td><?php echo $regel['naam'] ?></td>
                        <td><?php echo $regel['actie'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require 'footer.php' ?>
