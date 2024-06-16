<?php
// Inclusion des fichiers nécessaires
include_once('C:\xampp\htdocs\cuisine\includes\connexionBDD.php');
include_once('C:\xampp\htdocs\cuisine\includes\Donne_voiture_details.php');

// Vérifie si l'ID a été envoyé via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Prépare la requête SQL avec un paramètre pour l'ID
    $stmt = $pdo->prepare("SELECT * FROM voitures WHERE id = :id");

    // Liaison du paramètre ID avec la valeur envoyée par le formulaire
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

    // Exécution de la requête préparée
    $stmt->execute();

    // Récupération des résultats
    $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $voitures = [];
}
?>

<!-- Code HTML pour la modale -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titre de la Modale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (!empty($voitures)) {
                    foreach ($voitures as $voiture) { ?>
                        <h2><?= htmlspecialchars($voiture['marque']) ?> <?= htmlspecialchars($voiture['modele']) ?></h2>
                        <p><strong>Année :</strong> <?= htmlspecialchars($voiture['annee']) ?></p>
                        <p><strong>Kilométrage :</strong> <?= htmlspecialchars($voiture['kilometrage']) ?></p>
                        <p><strong>Prix :</strong> <?= htmlspecialchars($voiture['prix']) ?></p>
                        <p><strong>Carburant :</strong> <?= htmlspecialchars($voiture['carburant']) ?></p>
                        <p><strong>Transmission :</strong> <?= htmlspecialchars($voiture['transmission']) ?></p>
                        <p><strong>Couleur :</strong> <?= htmlspecialchars($voiture['couleur']) ?></p>
                        <p><strong>Description :</strong> <?= htmlspecialchars($voiture['description']) ?></p>
                        <h3>Détails de l'équipement :</h3>
                        <p><?= htmlspecialchars($voiture['equipement']) ?></p>
                        <p>ID de la voiture : <?= htmlspecialchars($voiture['id']) ?></p>
                        <img class="bd-placeholder-img card-img-top" src='\cuisine\upload\occasions\<?= htmlspecialchars($voiture['photo']) ?>' alt="Photo de la voiture">
                        <img src='/cuisine/upload/occasions/<?= htmlspecialchars($voiture["photo1"]) ?>' class="imgdetail" alt="Image 1">
                        <img src='/cuisine/upload/occasions/<?= htmlspecialchars($voiture["photo2"]) ?>' class="imgdetail" alt="Image 2">
                        <img src='/cuisine/upload/occasions/<?= htmlspecialchars($voiture["photo3"]) ?>' class="imgdetail" alt="Image 3">
                    <?php }
                } else { ?>
                    <p>Aucune voiture trouvée avec cet ID.</p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>