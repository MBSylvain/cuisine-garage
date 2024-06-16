<?php
include('C:\xampp\htdocs\cuisine\includes\header.php');
include_once('C:\xampp\htdocs\cuisine\includes\connexionBDD.php');
include_once('C:\xampp\htdocs\cuisine\includes\Donnee_voitures.php');
?>
<main>
    <h1>Liste des voitures</h1>

    <div class="voitures">

        <?php foreach ($voitures as $voiture) : ?>
            <div class="card-voitures">
                <img class="bd-placeholder-img card-img-top" src='\cuisine\upload\occasions\<?= htmlspecialchars($voiture['photo']) ?>' alt="Photo de la voiture">
                <div class="card-body">
                    <h2><?= htmlspecialchars($voiture['marque']) ?> <?= htmlspecialchars($voiture['modele']) ?></h2>
                    <p><strong>Année :</strong> <?= htmlspecialchars($voiture['annee']) ?></p>
                    <p><strong>Kilométrage :</strong> <?= htmlspecialchars($voiture['kilometrage']) ?></p>
                    <p><strong>Prix :</strong> <?= htmlspecialchars($voiture['prix']) ?></p>


                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Détails
                    </button>

                    <!-- Modal -->
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

                                    <?php foreach ($voitures as $voiture) { ?>
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
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-primary">afficher plus de photographie</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>



        <?php endforeach; ?>
    </div>
</main>
<?php include('C:\xampp\htdocs\cuisine\includes\footer.php') ?>