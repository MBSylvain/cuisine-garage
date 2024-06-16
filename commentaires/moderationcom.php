<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Récupérer les commentaires non validés dans la table o ou 1
$stmt = $pdo->query("SELECT * FROM commentaires WHERE valide ='0'");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modération des commentaires</title>
</head>

<body>

    <h2>Modération des commentaires</h2>

    <?php foreach ($comments as $comment) : var_dump($comment['id']) ?>
        <div>
            <p>Nom : <?= $comment['prenom'] ?> <?= $comment['nom'] ?></p>
            <p>Note : <?= $comment['note'] ?>/5</p>
            <p>Commentaire : <?= $comment['commentaire'] ?></p>
            <form action="../commentaires/statucom.php" method="post">
                <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                <select name="validation">
                    <option value="1">Approuver</option>
                    <option value="2">Rejeter</option>
                </select>
                <input type="submit">
            </form>
        </div>
        <hr>
    <?php endforeach; ?>

</body>

</html>