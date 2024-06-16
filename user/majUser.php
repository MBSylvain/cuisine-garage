<?php

// Récupérer les données soumises
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$id = $_POST['id'];
echo "Identifiant à mettre à jour : $id";

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Préparation et exécution de la requête de mise à jour
$stmt_update = $pdo->prepare('UPDATE connexion SET nom = ?, prenom = ?, email = ? WHERE id = ?');
$stmt_update->execute([$nom, $prenom, $email, $id]);

if ($stmt_update) {
    echo $message = 'Les informations ont été mises à jour avec succès.';
} else {
    echo $message = 'Erreur lors de la mise à jour des informations.';
}
// Redirection vers la page liste des salariés
header('Location: ..\Pages\tableauBord.php');
exit();
