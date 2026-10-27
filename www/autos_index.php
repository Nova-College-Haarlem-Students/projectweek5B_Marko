<?php include 'header.php'; ?>

<main>
    <div class="detail breed">
        <h2>Mijn auto's</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Kenteken</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Bouwjaar</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12-ABC-3</td>
                    <td>Volkswagen</td>
                    <td>Golf</td>
                    <td>2015</td>
                    <td><a href="autos_wijzig.php?id=1">Wijzig</a></td>
                </tr>
                <tr>
                    <td>K-456-DF</td>
                    <td>Volkswagen</td>
                    <td>Polo</td>
                    <td>2019</td>
                    <td><a href="autos_wijzig.php?id=2">Wijzig</a></td>
                </tr>
            </tbody>
        </table>

        <a href="autos_create.php" class="knop">Auto toevoegen</a>
    </div>
</main>

<?php include 'footer.php'; ?>
