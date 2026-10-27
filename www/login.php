<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Inloggen</h2>

        <form action="login_process.php" method="post">
            <p>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="e-mail">
            </p>
            <p>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="wachtwoord">
            </p>
            <button type="submit" class="knop">Inloggen</button>
        </form>

        <p>Nog geen account? <a href="registreren.php">Registreer hier</a></p>
    </div>
</main>

<?php include 'footer.php'; ?>
