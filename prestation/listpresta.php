<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Récupération des données de la base de données
$stmt_select = $pdo->prepare('SELECT prestation, id, detail, image, size FROM presta');
$stmt_select->execute();

// Affichage des résultats
while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
    $destination = '\cuisine\uplaods' . DIRECTORY_SEPARATOR . $row['image']; ?>

    <div class="card">
        <img src="<?php echo $destination ?>" width='150' alt="services">
        <div class="card-body">
            <p class="card-text"><?= $row['detail'] ?></p>
        </div>
        <!-- Formulaire pour supprimer la prestaion -->
        <form method="post" action="..\prestation\prestaSupp.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>

        <!-- Formulaire pour mettre à jour la prestation -->
        <form method="post" action="/prestation/majprestaform.php">

            <input type="hidden" name="id" value=<?= $row['id'] ?>>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

<?php } ?>