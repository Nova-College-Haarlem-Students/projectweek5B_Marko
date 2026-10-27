<?php
session_start();
require 'header.php';
?>

<main>
    <div class="detail">
        <h2>Account aanmaken</h2>

        <form action="registreren_process.php" method="post">
            <p>
                <label for="naam">Naam</label>
                <input type="text" name="naam" id="naam">
            </p>
            <p>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
            </p>
            <p>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password">
            </p>
            <button type="submit" class="knop">Registreren</button>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>
