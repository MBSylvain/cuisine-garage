<body>
    <h1>Ajouter une voiture</h1>
    <form action="../ajoutvoiture.php" method="post" enctype="multipart/form-data">
        <label for="marque">Marque :</label>
        <input type="text" name="marque" id="marque" required><br>

        <label for="modele">Modèle :</label>
        <input type="text" name="modele" id="modele" required><br>

        <label for="annee">Année :</label>
        <input type="number" name="annee" id="annee" required><br>

        <label for="kilometrage">Kilométrage :</label>
        <input type="number" name="kilometrage" id="kilometrage" required><br>

        <label for="prix">Prix :</label>
        <input type="number" name="prix" id="prix" required><br>

        <label for="carburant">Carburant :</label>
        <input type="text" name="carburant" id="carburant" required><br>

        <label for="transmission">Transmission :</label>
        <input type="text" name="transmission" id="transmission" required><br>

        <label for="couleur">Couleur :</label>
        <input type="text" name="couleur" id="couleur" required><br>

        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows="4" required></textarea><br>

        <label for="photo_principale">Photo principale :</label>
        <input type="file" name="photo_principale" id="photo_principale" accept="image/*" required><br>

        <label for="galerie_photos">Galerie de photos (max. 3 photos) :</label><br>
        <input type="file" name="photo1" id="photo1" accept="image/*"><br>
        <input type="file" name="photo2" id="photo2" accept="image/*"><br>
        <input type="file" name="photo3" id="photo3" accept="image/*"><br>

        <label for="detail">Détail supplémentaire :</label><br>
        <textarea name="detail" id="detail" rows="4"></textarea><br>

        <input type="submit" value="Ajouter la voiture">
    </form>
</body>

</html>