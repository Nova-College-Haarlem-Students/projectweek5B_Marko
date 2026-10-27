<?php include 'header.php'; ?>

<main>
    <div class="detail breed">
        <h2>Alle diensten</h2>
        <a href="diensten_create.php" class="knop">Nieuwe dienst</a>
        <a href="diensten_uitgezet.php" class="knop">Uitgezette diensten</a>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Duur</th>
                    <th>Prijs</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>APK-keuring</td>
                    <td>45 min</td>
                    <td>&euro; 39,95</td>
                    <td>
                        <a href="diensten_detail.php?id=1">Bekijk</a>
                        <a href="diensten_wijzig.php?id=1">Wijzig</a>
                        <a href="diensten_softdelete.php?id=1">Uitzetten</a>
                    </td>
                </tr>
                <tr>
                    <td>Kleine beurt</td>
                    <td>60 min</td>
                    <td>&euro; 129,00</td>
                    <td>
                        <a href="diensten_detail.php?id=2">Bekijk</a>
                        <a href="diensten_wijzig.php?id=2">Wijzig</a>
                        <a href="diensten_softdelete.php?id=2">Uitzetten</a>
                    </td>
                </tr>
                <tr>
                    <td>Grote beurt</td>
                    <td>120 min</td>
                    <td>&euro; 279,00</td>
                    <td>
                        <a href="diensten_detail.php?id=3">Bekijk</a>
                        <a href="diensten_wijzig.php?id=3">Wijzig</a>
                        <a href="diensten_softdelete.php?id=3">Uitzetten</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>
