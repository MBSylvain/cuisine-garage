<?php

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  echo "Identifiant à supprimer : $id";
  // Connexion à la base de données
  $pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

  // Préparation et exécution de la requête de suppression
  $stmt_delete = $pdo->prepare('DELETE FROM presta WHERE id = ?');
  $stmt_delete->execute([$id]);
  if ($stmt_delete) {
    echo "L'élément a été supprimé avec succès.";
  } else {
    echo "Erreur lors de la suppression de l'élément : " . implode(" ", $pdo->errorInfo());
  }

  header('Location: ..\Pages\tableauBord.php');
  exit();
}
