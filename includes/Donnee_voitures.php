<?php
// Récupération des données des voitures depuis la table "voitures"
$stmt_voitures = $pdo->query('SELECT * FROM voitures');
$voitures = $stmt_voitures->fetchAll(PDO::FETCH_ASSOC);
