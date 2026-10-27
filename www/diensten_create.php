<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Nieuwe dienst toevoegen</h2>

        <form action="diensten_create_process.php" method="post">
            <p>
                <label for="naam">Naam</label>
                <input type="text" id="naam" name="naam" value="">
            </p>
            <p>
                <label for="omschrijving">Omschrijving</label>
                <textarea id="omschrijving" name="omschrijving"></textarea>
            </p>
            <p>
                <label for="duur">Duur (minuten)</label>
                <input type="number" id="duur" name="duur_minuten" value="">
            </p>
            <p>
                <label for="prijs">Prijs</label>
                <input type="number" step="0.01" id="prijs" name="prijs" value="">
            </p>
            <button type="submit" class="knop">Toevoegen</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
