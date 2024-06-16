<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Récupérer les commentaires non validés
$stmt = $pdo->query("SELECT * FROM commentaires WHERE valide = '1'");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
