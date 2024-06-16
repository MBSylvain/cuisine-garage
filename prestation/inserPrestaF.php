<title>Formulaire d'Upload d'Images</title>

<body>
    <div class="card-tdb">
        <form action="../prestation/inserPresta.php" method="post" enctype="multipart/form-data">
            <label for="prestation">Prestation :</label>
            <input type="text" name="prestation" required><br>

            <label for="detail">Détails :</label>
            <textarea name="detail" rows="4" required></textarea><br>

            <label for="photo">Image :</label>
            <input type="file" name="photo" accept="image/jpeg, image/png, image/gif" required><br>

            <input type="submit" name="submit" value="Envoyer" class="boutton-contact">
        </form>
    </div>