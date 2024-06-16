<body>
    <h1>Horaires d'ouverture</h1>
    <form action="../horraires/ajouthorraire.php" method="POST">
        <table>
            <tr>
                <th>Jour</th>
                <th>Ouverture (matin)</th>
                <th>Fermeture (matin)</th>
                <th>Ouverture (après-midi)</th>
                <th>Fermeture (après-midi)</th>
                <th>Fermé</th>
            </tr>
            <?php
            $jours_semaine = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
            foreach ($jours_semaine as $jour) {
            ?>
                <tr>
                    <td><?= $jour ?></td>
                    <td><input type="time" name="<?= strtolower($jour) ?>_ouverture_matin"></td>
                    <td><input type="time" name="<?= strtolower($jour) ?>_fermeture_matin"></td>
                    <td><input type="time" name="<?= strtolower($jour) ?>_ouverture_apresmidi"></td>
                    <td><input type="time" name="<?= strtolower($jour) ?>_fermeture_apresmidi"></td>
                    <td><input type="checkbox" name="<?= strtolower($jour) ?>_ferme"></td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" value="Enregistrer">
    </form>
</body>

</html>