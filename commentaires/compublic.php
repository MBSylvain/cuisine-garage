<?php
include('C:\xampp\htdocs\cuisine\includes\connexions\connexionCommentaire.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modération des commentaires</title>
</head>

<body>

    <h2>Nos commentaires</h2>

    <?php foreach ($comments as $comment) : ?>

        <div class='comment'>
            <div class="comment">
                <h3><?= $comment['nom'] ?><?= $comment['prenom'] ?></h3>
                <p>Note :<?= $comment['note'] ?>/5</p>
            </div>
            <div>
                <p><?= $comment['commentaire'] ?>.</p>
            </div>
        </div>
    <?php endforeach; ?>

</body>

</html>