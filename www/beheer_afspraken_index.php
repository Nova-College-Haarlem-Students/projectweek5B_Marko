<?php
require 'session_check.php';

if ($_SESSION['role'] != 'medewerker' && $_SESSION['role'] != 'admin') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'database.php';

// monteurs voor de keuzelijst (DISTINCT = geen dubbele)
$stmt = $conn->prepare("SELECT DISTINCT users.user_id, users.naam
                        FROM afspraken
                        LEFT JOIN users ON afspraken.monteur_id = users.user_id
                        WHERE afspraken.monteur_id IS NOT NULL");
$stmt->execute();
$monteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// diensten voor de keuzelijst
$stmt = $conn->prepare("SELECT * FROM diensten");
$stmt->execute();
$diensten = $stmt->fetchAll(PDO::FETCH_ASSOC);

// alle afspraken, ook zonder monteur
$sql = "SELECT afspraken.*, autos.kenteken, diensten.naam AS dienst, users.naam AS monteur
        FROM afspraken
        LEFT JOIN autos ON afspraken.auto_id = autos.auto_id
        LEFT JOIN diensten ON afspraken.dienst_id = diensten.dienst_id
        LEFT JOIN users ON afspraken.monteur_id = users.user_id
        WHERE 1 = 1";
$params = [];

// filter op monteur
if (!empty($_GET['monteur_id'])) {
    $sql = $sql . " AND afspraken.monteur_id = :monteur_id";
    $params['monteur_id'] = $_GET['monteur_id'];
}

// filter op dienst
if (!empty($_GET['dienst_id'])) {
    $sql = $sql . " AND afspraken.dienst_id = :dienst_id";
    $params['dienst_id'] = $_GET['dienst_id'];
}

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$afspraken = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <form method="GET" class="filter">
        <h2>Filteren</h2>

        <select name="monteur_id">
            <option value="">Alle monteurs</option>
            <?php foreach ($monteurs as $monteur) : ?>
                <option value="<?php echo $monteur['user_id'] ?>"><?php echo $monteur['naam'] ?></option>
            <?php endforeach; ?>
        </select>

        <select name="dienst_id">
            <option value="">Alle diensten</option>
            <?php foreach ($diensten as $dienst) : ?>
                <option value="<?php echo $dienst['dienst_id'] ?>"><?php echo $dienst['naam'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Filteren</button>
    </form>

    <div class="detail breed">
        <h2>Alle afspraken</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Kenteken</th>
                    <th>Dienst</th>
                    <th>Prijs</th>
                    <th>Monteur</th>
                    <th>Km-stand</th>
                    <th>Acties</th>
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
                        <td><?php echo $afspraak['monteur'] ?></td>
                        <td><?php echo $afspraak['kilometerstand'] ?></td>
                        <td><a href="beheer_afspraken_wijzig.php?id=<?php echo $afspraak['afspraak_id'] ?>">Wijzig</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require 'footer.php' ?>
