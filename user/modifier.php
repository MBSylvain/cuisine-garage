<?php
$user_id = $_POST['id'];
$user_nom = $_POST['nom'];
$user_prenom = $_POST['prenom'];
$user_email = $_POST['email'];

?>
<div>
    <h2>Modifier les informations de l'utilisateur</h2>
    <?php echo $user_nom; ?>
    <?php echo $user_prenom; ?>
    <?php echo $user_email; ?>
    <form method="post" action="../user/majUser.php" ?>
        <input type="hidden" name="id" value=<?= $user_id ?> />
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Enregistrer les modifications</button>
    </form>
</div>