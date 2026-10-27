<?php include 'header.php'; ?>

<main>
    <form method="GET" class="filter">
        <h2>Filteren</h2>

        <select name="monteur_id">
            <option value="">Alle monteurs</option>
            <option value="2">Piet</option>
            <option value="3">Ali</option>
        </select>

        <select name="dienst_id">
            <option value="">Alle diensten</option>
            <option value="1">APK-keuring</option>
            <option value="2">Kleine beurt</option>
            <option value="3">Grote beurt</option>
            <option value="4">Banden wisselen</option>
        </select>

        <button type="submit">Filteren</button>
    </form>

    <div class="detail breed">
        <h2>Alle afspraken</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Klant</th>
                    <th>Kenteken</th>
                    <th>Dienst</th>
                    <th>Prijs</th>
                    <th>Monteur</th>
                    <th>Km-stand</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2026-11-02</td>
                    <td>09:00</td>
                    <td>Jan Jansen</td>
                    <td>12-ABC-3</td>
                    <td>APK-keuring</td>
                    <td>&euro; 39,95</td>
                    <td>Nog niet toegewezen</td>
                    <td>-</td>
                    <td><a href="beheer_afspraken_wijzig.php?id=1">Wijzig</a></td>
                </tr>
                <tr>
                    <td>2026-10-20</td>
                    <td>14:00</td>
                    <td>Jan Jansen</td>
                    <td>K-456-DF</td>
                    <td>Kleine beurt</td>
                    <td>&euro; 129,00</td>
                    <td>Piet</td>
                    <td>120000</td>
                    <td><a href="beheer_afspraken_wijzig.php?id=2">Wijzig</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>
