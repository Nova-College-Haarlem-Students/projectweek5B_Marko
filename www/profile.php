<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Mijn profiel</h2>

        <form action="profile_update_process.php" method="post">
            <p>
                <label for="naam">Naam</label>
                <input type="text" name="naam" id="naam" value="Jan Jansen">
            </p>
            <p>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="jan@voorbeeld.nl">
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
