<body>
    <h2>Modifier les horaires: </h2>
    <?php echo $_POST['jam']; ?>
    <form action="../horraires/majhorraire.php" method="post">
        <label for="ouverture_matin">Heure d'ouverture (matin) :</label>
        <input type="time" name="ouverture_matin" id="ouverture_matin"><br>

        <label for="fermeture_matin">Heure de fermeture (matin) :</label>
        <input type="time" name="fermeture_matin" id="fermeture_matin"><br>

        <label for="ouverture_apresmidi">Heure d'ouverture (après-midi) :</label>
        <input type="time" name="ouverture_apresmidi" id="ouverture_apresmidi"><br>

        <label for="fermeture_apresmidi">Heure de fermeture (après-midi) :</label>
        <input type="time" name="fermeture_apresmidi" id="fermeture_apresmidi"><br>

        <label for="ferme">Fermé :</label>
        <input type="checkbox" name="ferme" id="ferme"><br>

        <!-- Ajoutez un champ caché pour l'ID de l'horaire à modifier -->
        <input type="hidden" name='id' value="<?= $_POST['jam'] ?>">

        <input type="submit" value="Modifier">
    </form>
</body>

</html>