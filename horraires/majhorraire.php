<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Vérification de la méthode de requête HTTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $ouverture_matin = $_POST['ouverture_matin'];
    $fermeture_matin = $_POST['fermeture_matin'];
    $ouverture_apresmidi = $_POST['ouverture_apresmidi'];
    $fermeture_apresmidi = $_POST['fermeture_apresmidi'];
    $ferme = isset($_POST['ferme']) ? 1 : 0;

    // Préparation de la requête SQL de mise à jour
    $stmt = $pdo->prepare('UPDATE horaires SET ouverture_matin = ?, fermeture_matin = ?, ouverture_apresmidi = ?, fermeture_apresmidi = ?, ferme = ? WHERE id = ?');

    // Exécution de la requête avec les valeurs des champs du formulaire
    $stmt->execute([$ouverture_matin, $fermeture_matin, $ouverture_apresmidi, $fermeture_apresmidi, $ferme, $id]);

    // Redirection vers la page d'affichage des horaires après la mise à jour
    header('Location: ..\Pages\tableauBord.php');
    exit();
}
