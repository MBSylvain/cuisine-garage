<?php include('template\header.php') ?>

<form action="../prestation/majpresta.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value=<?= $_POST['id'] ?>>
    <label for="prestation">Prestation :</label>
    <input type="text" name="prestation" required><br>

    <label for="detail">Détails :</label>
    <textarea name="detail" rows="4" required></textarea><br>

    <label for="photo">Image :</label>
    <input type="file" name="photo" accept="image/jpeg, image/png, image/gif" required><br>

    <input type="submit" name="submit" value="Envoyer">
</form>