<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Préparation et exécution de la requête pour récupérer les horaires
$stmt = $pdo->query('SELECT * FROM horaires');
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>

    <p>Horaires d'ouverture</p>

    <table>
        <thead>
            <tr>
                <th>Jour</th>
                <th>Ouverture (Matin)</th>
                <th>Fermeture (Matin)</th>
                <th>Ouverture (Après-midi)</th>
                <th>Fermeture (Après-midi)</th>
                <th>Fermé</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horaires as $horaire) : ?>
                <tr>
                    <td><?= $horaire['jour'] ?></td>
                    <td><?= $horaire['ouverture_matin']  ?></td>
                    <td><?= $horaire['fermeture_matin'] ?></td>
                    <td><?= $horaire['ouverture_apresmidi'] ?></td>
                    <td><?= $horaire['fermeture_apresmidi'] ?></td>
                    <td><?= $horaire['ferme'] ? 'Oui' : 'Non' ?></td>
                    <td>
                        <form action="../horraires/modifierhorraire.php" method="post">
                            <!-- il faut récupérer l'ID de l'horaire à modifier et le caché -->
                            <input type="hidden" name="jam" value="<?= $horaire['id'] ?>">

                            <input type="submit" value="Modifier - <?php $horaire['jour'] ?>">
                    </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>