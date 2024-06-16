<?php
// connexion à la BDD

$obejtPdo = new PDO('mysql:host=localhost;dbname=gara_vparot', 'root', '');

// Récupère les information du formulaire par la méthode POST
$nom = $_POST['nom'];
$prenom = $_POST['Prenom'];
$mel = $_POST['email'];
$mdps = $_POST['password'];


// on crée un objet pdo  on utlise la requete d'insertion sql entre ' '
$inserUsert = $obejtPdo->prepare('INSERT INTO connexion ( nom, prenom, email, mdp)VALUES(?,?,?,?)');
$inserUsert->execute(array($nom, $prenom, $mel, $mdps));
if ($inserUsert) {
    echo $message = 'Utilisateur ajouté';
} else {
    echo $message = 'Utilisateur non ajouté';
}
header('Location: ..\Pages\tableauBord.php');
