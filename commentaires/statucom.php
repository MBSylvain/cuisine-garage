<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'id du commentaire
    $id = $_POST['id'];
    $approved = $_POST['validation'];

    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

    // Préparer la requête SQL pour insérer le commentaire dans la base de données
    $stmt = $pdo->prepare("UPDATE commentaires SET valide=? WHERE id=?");

    // Exécuter la requête avec les valeurs des champs du formulaire
    $stmt->execute([$approved, $id]);

    // Vérifier si l'insertion a réussi
    if ($stmt) {
        echo "Le commentaire a été validé avec succès et sera affiché publiqiement.";
    } else {
        echo "Une erreur s'est produite lors de la validation du commentaire. Veuillez réessayer.";
    }
}
header('Location: ..\Pages\tableauBord.php');
exit();
