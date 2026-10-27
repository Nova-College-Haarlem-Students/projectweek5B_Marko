<?php include 'header.php'; ?>

<main>
    <form method="GET" class="filter">
        <h2>Sorteren</h2>
        <button type="submit" name="sorteer" value="prijs_op">Prijs laag &rarr; hoog</button>
        <button type="submit" name="sorteer" value="prijs_af">Prijs hoog &rarr; laag</button>
        <button type="submit" name="sorteer" value="duur_op">Duur kort &rarr; lang</button>
        <button type="submit" name="sorteer" value="duur_af">Duur lang &rarr; kort</button>
    </form>

    <h2>Onze diensten</h2>

    <div class="diensten">
        <div class="dienst">
            <h3>APK-keuring</h3>
            <p>Wettelijke keuring van je auto.</p>
            <p>Duur: 45 minuten</p>
            <p class="prijs">&euro; 39,95</p>
            <a href="diensten_detail.php?id=1" class="knop">Bekijk details</a>
        </div>
        <div class="dienst">
            <h3>Kleine beurt</h3>
            <p>Olie en filter vervangen, alles nalopen.</p>
            <p>Duur: 60 minuten</p>
            <p class="prijs">&euro; 129,00</p>
            <a href="diensten_detail.php?id=1" class="knop">Bekijk details</a>
        </div>
        <div class="dienst">
            <h3>Grote beurt</h3>
            <p>Uitgebreid onderhoud volgens de fabriek.</p>
            <p>Duur: 120 minuten</p>
            <p class="prijs">&euro; 279,00</p>
            <a href="diensten_detail.php?id=1" class="knop">Bekijk details</a>
        </div>
        <div class="dienst">
            <h3>Banden wisselen</h3>
            <p>Zomer- of winterbanden omzetten.</p>
            <p>Duur: 30 minuten</p>
            <p class="prijs">&euro; 49,50</p>
            <a href="diensten_detail.php?id=1" class="knop">Bekijk details</a>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
