<?php include 'header.php'; ?>

<main>
    <div class="detail breed">
        <h2>Mijn afspraken</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Kenteken</th>
                    <th>Dienst</th>
                    <th>Prijs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2026-11-02</td>
                    <td>09:00</td>
                    <td>12-ABC-3</td>
                    <td>APK-keuring</td>
                    <td>&euro; 39,95</td>
                </tr>
                <tr>
                    <td>2026-10-20</td>
                    <td>14:00</td>
                    <td>K-456-DF</td>
                    <td>Kleine beurt</td>
                    <td>&euro; 129,00</td>
                </tr>
            </tbody>
        </table>

        <a href="afspraken_create.php" class="knop">Nieuwe afspraak</a>
    </div>
</main>

<?php include 'footer.php'; ?>
