<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// ...


// Récupération des données de la base de données
$stmt_select = $pdo->prepare('SELECT prestation, id, detail, image, size FROM presta');
$stmt_select->execute();
