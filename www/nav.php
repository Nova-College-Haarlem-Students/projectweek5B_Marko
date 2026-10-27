<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">Over ons</a>

    <?php if (isset($_SESSION['user_id'])) : ?>

        <?php if ($_SESSION['role'] == 'klant') : ?>
            <a href="dashboard.php">Mijn afspraken</a>
            <a href="autos_index.php">Mijn auto's</a>
            <a href="afspraken_create.php">Afspraak maken</a>
            <a href="profile.php">Mijn profiel</a>
        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'medewerker' || $_SESSION['role'] == 'admin') : ?>
            <a href="beheer_afspraken_index.php">Afspraken beheren</a>
            <a href="diensten_index.php">Diensten beheren</a>
            <a href="autos_zonder_afspraak.php">Auto's zonder afspraak</a>
        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'admin') : ?>
            <a href="statistieken.php">Statistieken</a>
            <a href="logboek.php">Logboek</a>
        <?php endif; ?>

        <a href="logout.php">Uitloggen</a>

    <?php else : ?>
        <a href="login.php">Inloggen</a>
        <a href="registreren.php">Registreren</a>
    <?php endif; ?>
</nav>
