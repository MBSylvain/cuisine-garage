<?php
// on vérifie si formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // on valide les données 
    if (empty($firstName) || empty($lastName) || empty($rating) || empty($comment)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

        // Préparer la requête SQL pour insérer le commentaire dans la base de données
        $stmt = $pdo->prepare("INSERT INTO commentaires (prenom, nom, note, commentaire, valide) VALUES (?, ?, ?, ?, 0)");

        // Exécuter la requête avec les valeurs des champs du formulaire
        $stmt->execute([$firstName, $lastName, $rating, $comment]);

        // Vérifier si l'insertion a réussi
        if ($stmt) {
            echo "La modération du commentaire a bien été prise en compte.";
            header("Location: formulaire_commentaire.php");
        } else {
            echo "Une erreur s'est produite lors de l'ajout du commentaire. Veuillez réessayer.";
        }
    }
} else {
    // Redirection vers le formualre d'ajout de commentaire
    header("Location: formulaire_commentaire.php");
    exit();
}
