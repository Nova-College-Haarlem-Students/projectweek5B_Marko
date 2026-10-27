<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Dienst wijzigen</h2>

        <form action="diensten_update_process.php" method="post">
            <p>
                <label for="naam">Naam</label>
                <input type="text" id="naam" name="naam" value="APK-keuring">
            </p>
            <p>
                <label for="omschrijving">Omschrijving</label>
                <textarea id="omschrijving" name="omschrijving">Wettelijke keuring van je auto.</textarea>
            </p>
            <p>
                <label for="duur">Duur (minuten)</label>
                <input type="number" id="duur" name="duur_minuten" value="45">
            </p>
            <p>
                <label for="prijs">Prijs</label>
                <input type="number" step="0.01" id="prijs" name="prijs" value="39.95">
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
