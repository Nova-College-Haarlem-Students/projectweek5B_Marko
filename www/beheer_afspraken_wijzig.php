<?php include 'header.php'; ?>

<main>
    <div class="detail">
        <h2>Afspraak wijzigen</h2>
        <p>2026-11-02 09:00 - 12-ABC-3 - APK-keuring</p>

        <form action="beheer_afspraken_update_process.php" method="post">
            <p>
                <label for="monteur">Monteur</label>
                <select id="monteur" name="monteur_id">
                    <option value="">Nog niet toegewezen</option>
                    <option value="2">Piet</option>
                    <option value="3">Ali</option>
                </select>
            </p>
            <p>
                <label for="kilometerstand">Kilometerstand (na afloop)</label>
                <input type="number" id="kilometerstand" name="kilometerstand">
            </p>
            <p>
                <label for="opmerking">Opmerking</label>
                <textarea id="opmerking" name="opmerking" placeholder="bijv. remblokken bijna op"></textarea>
            </p>
            <button type="submit" class="knop">Opslaan</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
