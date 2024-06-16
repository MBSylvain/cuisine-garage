<?php include('C:\xampp\htdocs\cuisine\includes\header.php'); ?>
<div class="form-filtre">
    <h1>Filtrer les Voitures</h1>
    <div class="form-items">
        <form method="POST" action="">
            <label for="marque">Marque:</label>
            <input type="text" id="marque" name="marque">
            <label for="modele">Modèle:</label>
            <input type="text" id="modele" name="modele">
            <label for="annee">Année:</label>
            <input type="text" id="annee" name="annee">
            <label for="carburant">Carburant:</label>
            <input type="text" id="carburant" name="carburant">
            <label for="transmission">Transmission:</label>
            <input type="text" id="transmission" name="transmission">
            <label for="couleur">Couleur:</label>
            <input type="text" id="couleur" name="couleur">
            <button class="boutton-voitures" type="submit">Filtrer</button>
        </form>
    </div>
</div>
<?php
include_once('C:\xampp\htdocs\cuisine\includes\connexionBDD.php');

// Récupérer les critères de filtrage depuis le formulaire POST
$marque = isset($_POST['marque']) ? $_POST['marque'] : '';
$modele = isset($_POST['modele']) ? $_POST['modele'] : '';
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
$carburant = isset($_POST['carburant']) ? $_POST['carburant'] : '';
$transmission = isset($_POST['transmission']) ? $_POST['transmission'] : '';
$couleur = isset($_POST['couleur']) ? $_POST['couleur'] : '';

// Commencez par une requête de base
$query = "SELECT * FROM voitures WHERE 1=1";
$params = [];

// Ajouter des conditions dynamiques en fonction des critères de filtrage
if (!empty($marque)) {
    $query .= " AND marque LIKE :marque";
    $params[':marque'] = '%' . $marque . '%';
}
if (!empty($modele)) {
    $query .= " AND modele LIKE :modele";
    $params[':modele'] = '%' . $modele . '%';
}
if (!empty($annee)) {
    $query .= " AND annee LIKE :annee";
    $params[':annee'] = '%' . $annee . '%';
}
if (!empty($carburant)) {
    $query .= " AND carburant LIKE :carburant";
    $params[':carburant'] = '%' . $carburant . '%';
}
if (!empty($transmission)) {
    $query .= " AND transmission LIKE :transmission";
    $params[':transmission'] = '%' . $transmission . '%';
}
if (!empty($couleur)) {
    $query .= " AND couleur LIKE :couleur";
    $params[':couleur'] = '%' . $couleur . '%';
}

// Préparer et exécuter la requête
$stmt_voitures = $pdo->prepare($query);
$stmt_voitures->execute($params);
$voitures = $stmt_voitures->fetchAll(PDO::FETCH_ASSOC); ?>


<?php if (!empty($voitures)) { ?>
    <div class="voitures">
        <?php foreach ($voitures as $voiture) { ?>
            <div class="card-voitures">
                <div class="card-img">
                    <h2><?= htmlspecialchars($voiture['marque']) ?> <?= htmlspecialchars($voiture['modele']) ?></h2>
                    <img class="bd-placeholder-img card-img-top" src='/cuisine/upload/occasions/<?= htmlspecialchars($voiture['photo']) ?>' alt="Photo de la voiture">
                </div>
                <div class="card-body">
                    <p><strong>Année :</strong> <?= htmlspecialchars($voiture['annee']) ?></p>
                    <p><strong>Kilométrage :</strong> <?= htmlspecialchars($voiture['kilometrage']) ?>km</p>
                    <p><strong>Prix :</strong> <?= htmlspecialchars($voiture['prix']) ?>€</p>
                </div>
                <button class="boutton-voitures" type="button" name="id" onclick="showDetails(<?= htmlspecialchars(json_encode($voiture)) ?>)" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Détails
                </button>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <p>Aucun résultat trouvé.</p>
<?php } ?>
<?php include('C:\xampp\htdocs\cuisine\includes\footer.php') ?>


<!-- Structure de la modale -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Détails de la voiture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Contenu dynamique -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>




    </body>

    <script>
        function showDetails(voiture) {
            var modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = `
        <h2>${voiture.marque} ${voiture.modele}</h2>
        <p><strong>Année :</strong> ${voiture.annee}</p>
        <p><strong>Kilométrage :</strong> ${voiture.kilometrage}</p>
        <p><strong>Prix :</strong> ${voiture.prix}</p>
        <p><strong>Carburant :</strong> ${voiture.carburant}</p>
        <p><strong>Transmission :</strong> ${voiture.transmission}</p>
        <p><strong>Couleur :</strong> ${voiture.couleur}</p>
        <p><strong>Description :</strong> ${voiture.description}</p>
        <h3>Détails de l'équipement :</h3>
        <p>${voiture.equipement}</p>
        <img class="bd-placeholder-img card-img-top" src='/cuisine/upload/occasions/${voiture.photo}'' alt="Photo de la voiture">
        <img src='/cuisine/upload/occasions/${voiture.photo1}' class="imgdetail" alt="Image 1">
        <img src='/cuisine/upload/occasions/${voiture.photo2}' class="imgdetail" alt="Image 2">
        <img src='/cuisine/upload/occasions/${voiture.photo3}' class="imgdetail" alt="Image 3">
    `;
            $('#myModal').modal('show');
        }
    </script>

    </html>