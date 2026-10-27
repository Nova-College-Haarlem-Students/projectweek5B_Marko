<?php
require 'session_check.php';

if ($_SESSION['role'] != 'klant') {
    echo "Je mag deze pagina niet bekijken";
    exit;
}

require 'header.php';
?>

<main>
    <div class="detail">
        <h2>Auto toevoegen</h2>

        <form action="autos_create_process.php" method="post">
            <p>
                <label for="kenteken">Kenteken</label>
                <input type="text" id="kenteken" name="kenteken">
            </p>
            <p>
                <label for="merk">Merk</label>
                <input type="text" id="merk" name="merk">
            </p>
            <p>
                <label for="model">Model</label>
                <input type="text" id="model" name="model">
            </p>
            <p>
                <label for="bouwjaar">Bouwjaar</label>
                <input type="number" id="bouwjaar" name="bouwjaar">
            </p>
            <button type="submit" class="knop">Toevoegen</button>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>
