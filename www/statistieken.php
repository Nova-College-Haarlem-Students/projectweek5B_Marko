<?php include 'header.php'; ?>

<main>
    <h2>Statistieken</h2>

    <div class="cijfers">
        <div class="cijfer">
            <h3>Gemiddelde prijs per afspraak</h3>
            <p>&euro; 124,36</p>
        </div>
        <div class="cijfer">
            <h3>Oudste auto</h3>
            <p>2005</p>
        </div>
        <div class="cijfer">
            <h3>Nieuwste auto</h3>
            <p>2023</p>
        </div>
    </div>

    <div class="detail breed">
        <h2>Afspraken en omzet per dienst</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Dienst</th>
                    <th>Aantal afspraken</th>
                    <th>Omzet</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>APK-keuring</td><td>12</td><td>&euro; 479,40</td></tr>
                <tr><td>Kleine beurt</td><td>8</td><td>&euro; 1.032,00</td></tr>
                <tr><td>Grote beurt</td><td>3</td><td>&euro; 837,00</td></tr>
                <tr><td>Banden wisselen</td><td>5</td><td>&euro; 247,50</td></tr>
            </tbody>
        </table>

        <h2>Merken met meer dan twee auto's</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Aantal auto's</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Volkswagen</td><td>3</td></tr>
                <tr><td>Toyota</td><td>3</td></tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>
