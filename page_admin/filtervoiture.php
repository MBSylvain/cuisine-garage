<?php
include('C:\xampp\htdocs\cuisine\includes\header.php');
include_once('C:\xampp\htdocs\cuisine\includes\connexionBDD.php');
include_once('C:\xampp\htdocs\cuisine\includes\Donnee_voitures.php');

// Récupérer les critères de filtrage
$marque = isset($_GET['marque']) ? $_GET['marque'] : '';
$modele = isset($_GET['modele']) ? $_GET['modele'] : '';
$annee = isset($_GET['annee']) ? $_GET['annee'] : '';
$carburant = isset($_GET['carburant']) ? $_GET['carburant'] : '';
$transmission = isset($_GET['transmission']) ? $_GET['transmission'] : '';
$couleur = isset($_GET['couleur']) ? $_GET['couleur'] : '';

// Construire la requête SQL avec les critères de filtrage
$query = "SELECT * FROM voitures WHERE 1=1";
if (!empty($marque)) {
    $query .= " AND marque LIKE '%" . $conn->real_escape_string($marque) . "%'";
}
if (!empty($modele)) {
    $query .= " AND modele LIKE '%" . $conn->real_escape_string($modele) . "%'";
}
if (!empty($annee)) {
    $query .= " AND annee LIKE '%" . $conn->real_escape_string($annee) . "%'";
}
if (!empty($carburant)) {
    $query .= " AND carburant LIKE '%" . $conn->real_escape_string($carburant) . "%'";
}
if (!empty($transmission)) {
    $query .= " AND transmission LIKE '%" . $conn->real_escape_string($transmission) . "%'";
}
if (!empty($couleur)) {
    $query .= " AND couleur LIKE '%" . $conn->real_escape_string($couleur) . "%'";
}

// Exécuter la requête
$result = $conn->query($query);

// Afficher les résultats
if ($result->num_rows > 0) {
    while ($voiture = $result->fetch_assoc()) {
?>
        <div class="card-body">
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
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo 'Aucun résultat trouvé.';
}

// Fermer la connexion
$conn->close();
?>