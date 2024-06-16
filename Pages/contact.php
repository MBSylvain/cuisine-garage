<?php
include_once('C:\xampp\htdocs\cuisine\includes\header.php');
?>
<div class="card-contact">
    <h2>Contactez-nous</h2>

    <div class="card-form">
        <form action="ajoutcom.php" method="post" class="card-form-input">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <input type="submit" value="Envoyer" class="boutton-contact">
        </form>
    </div>
</div>
<?php include('C:\xampp\htdocs\cuisine\includes\footer.php') ?>