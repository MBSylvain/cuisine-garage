<?php

// Récupère les information du formulaire par la méthode POST
$nom = $_POST['services'];
$titre = $_POST['titre'];
$taille = $_POST['size'];
$descrip = $_POST['description'];
$type = $_FILES['type'];



// on crée un objet pdo  on utlise la requete d'insertion sql entre ' '
$inserPrest = $obejtPdo->prepare('INSERT INTO presta (non, type, taille, description)VALUES(?,?,?,?)');
$inserPrest->execute(array($nom, $titre, $type, $descrip));
if ($inserPrest) {
    echo $message = 'Prestation ajouté dans la BDD';
} else {
    echo $message = 'Echec de l\ajouté';
}

// Création du chemin du dossier ou sera place l'image
$dossier = 'upload\services';
$imgTemporaire = $_FILES['fichier']['tmp_name'];
//on vérifie si le fichier a bien été téléchargé
$nomImg = $_FILES['fichier']['name'];

move_uploaded_file($imgTemporaire, $dossier . $nomImg);

if (!is_uploaded_file(($imgTemporaire))) {
    echo $message = 'fichier telecharge';
} else {

    echo $message = "le fichier est introuvable";
}
if (move_uploaded_file($imgTemporaire, $dossier . $nomImg)) {
    header("http:/localhost/cuisine/upload/services/");
} else {
    exit("impossible de copie le fichier dans le $dossier");
}
