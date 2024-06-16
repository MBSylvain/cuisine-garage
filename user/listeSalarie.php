<?php

try {
    $pdo = new PDO('mysql:dbname=gara_vparot;host=localhost', 'root', '');
} catch (PDOException $e) {
    // Gestion de l'exception
    echo 'Impossible de se connecter à la base de donnée';
}

$stmt_select = $pdo->prepare('SELECT id, nom, prenom, email, mdp FROM connexion');
$stmt_select->execute();

// Affichage des résultats
echo $list = 'La liste de vos salariés enregistré dans la base de donnée';
while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) { ?>

    <div class="card-employ">

        <div class="card-body row">
            <h6 class="card-title">Nom: <?= $row['nom'] ?></h6>
            <h6 class="card-subtitle mb-2 text-body-secondary">Prénom: <?= $row['prenom'] ?></h6>
            <p class="card-text">Email:<?= $row['email'] ?>.</p>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">Supprimer</button>
            </form>
            <form method="post" action="../user/modifier.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="nom" value="<?= $row['nom'] ?>">
                <input type="hidden" name="prenom" value="<?= $row['prenom'] ?>">
                <input type="hidden" name="email" value="<?= $row['email'] ?>">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </form>
        </div>
    </div>
<?php } ?>

<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $pdo = new PDO('mysql:dbname=gara_vparot;host=localhost', 'root', '');
    } catch (PDOException $e) {
        // Gestion de l'exception
        echo 'Impossible de se connecter à la base de donnée';
    }

    // Préparation et exécution de la requête de suppression
    $stmt_delete = $pdo->prepare('DELETE FROM connexion WHERE id = ?');
    $stmt_delete->execute([$id]);

    if ($stmt_delete) {
        $_SESSION['message'] = 'L\'élément a été supprimé avec succès.';
    } else {
        $_SESSION['message'] = 'Erreur lors de la suppression de l\'élément.';
    }
}

?>