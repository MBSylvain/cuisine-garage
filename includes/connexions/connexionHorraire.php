<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Préparation et exécution de la requête pour récupérer les horaires
$stmt = $pdo->query('SELECT * FROM horaires');
$horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
