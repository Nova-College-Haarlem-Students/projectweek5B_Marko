<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Afspraak maken</h2>

        <form action="afspraken_create_process.php" method="post">
            <p>
                <label for="auto">Auto</label>
                <select id="auto" name="auto_id">
                    <option value="1">12-ABC-3 - Volkswagen Golf</option>
                    <option value="2">K-456-DF - Volkswagen Polo</option>
                </select>
            </p>
            <p>
                <label for="dienst">Dienst</label>
                <select id="dienst" name="dienst_id">
                    <option value="1">APK-keuring (&euro; 39,95)</option>
                    <option value="2">Kleine beurt (&euro; 129,00)</option>
                    <option value="3">Grote beurt (&euro; 279,00)</option>
                    <option value="4">Banden wisselen (&euro; 49,50)</option>
                </select>
            </p>
            <p>
                <label for="datum">Datum</label>
                <input type="date" id="datum" name="datum">
            </p>

            <!-- Later: met AJAX (fetch) de vrije tijden ophalen -->
            <button type="button" class="knop">Toon vrije tijden</button>

            <div class="tijden">
                <button type="button">08:00</button>
                <button type="button">09:00</button>
                <button type="button">11:00</button>
                <button type="button">13:00</button>
                <button type="button">15:00</button>
            </div>

            <button type="submit" class="knop">Afspraak maken</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
