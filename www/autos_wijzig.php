<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Auto wijzigen</h2>

        <form action="autos_update_process.php" method="post">
            <p>
                <label for="kenteken">Kenteken</label>
                <input type="text" id="kenteken" name="kenteken" value="12-ABC-3">
            </p>
            <p>
                <label for="merk">Merk</label>
                <input type="text" id="merk" name="merk" value="Volkswagen">
            </p>
            <p>
                <label for="model">Model</label>
                <input type="text" id="model" name="model" value="Golf">
            </p>
            <p>
                <label for="bouwjaar">Bouwjaar</label>
                <input type="number" id="bouwjaar" name="bouwjaar" value="2015">
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
