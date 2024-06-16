<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($id !== null) {
    // Préparation et exécution de la requête pour récupérer les données des voitures
    $stmt_voitures = $pdo->prepare('SELECT * FROM voitures WHERE id = ?');
    $stmt_voitures->execute([$id]);

    // Récupération des données
    $voitures = $stmt_voitures->fetchAll(PDO::FETCH_ASSOC);
}
