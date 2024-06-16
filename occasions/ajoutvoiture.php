<?php
// Assurez-vous de valider et sécuriser les données reçues

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $kilometrage = $_POST['kilometrage'];
    $prix = $_POST['prix'];
    $carburant = $_POST['carburant'];
    $transmission = $_POST['transmission'];
    $couleur = $_POST['couleur'];
    $description = $_POST['description'];
    $detail = $_POST['detail'];

    // Récupération de la photo principale
    $photo_principale_name = $_FILES['photo_principale']['name'];
    $photo_principale_tmp_name = $_FILES['photo_principale']['tmp_name'];
    $photo_principale_size = $_FILES['photo_principale']['size'];
    $photo_principale_error = $_FILES['photo_principale']['error'];
    // Récupération des photo de la galerie
    $photo1 = $_FILES['photo1']['name'];
    $photo1_tmp_name = $_FILES['photo1']['tmp_name'];
    $photo1_size = $_FILES['photo1']['size'];
    $photo1_error = $_FILES['photo1']['error'];
    $photo2 = $_FILES['photo2']['name'];
    $photo2_tmp_name = $_FILES['photo2']['tmp_name'];
    $photo2_size = $_FILES['photo2']['size'];
    $photo2_error = $_FILES['photo2']['error'];
    $photo3 = $_FILES['photo3']['name'];
    $photo3_tmp_name = $_FILES['photo3']['tmp_name'];
    $photo3_size = $_FILES['photo3']['size'];
    $photo3_error = $_FILES['photo3']['error'];


    // Vérification de la taille du fichier de la photo principale
    $maxFileSize = 5 * 1024 * 1024; // 5 Mo
    if ($photo_principale_size > $maxFileSize || $photo1_size > $maxFileSize || $photo2_size > $maxFileSize || $photo3_size > $maxFileSize) {
        exit('La taille d\'une ou plusieurs photos dépasse la limite autorisée.');
    }

    // Vérification du type de fichier de la photo principale
    $allowedImageTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
    $photo_principale_type = exif_imagetype($photo_principale_tmp_name);
    $photo1_type = exif_imagetype($photo1_tmp_name);
    $photo2_type = exif_imagetype($photo2_tmp_name);
    $photo3_type = exif_imagetype($photo3_tmp_name);

    if (!in_array($photo_principale_type, $allowedImageTypes) || !in_array($photo1_type, $allowedImageTypes) || !in_array($photo2_type, $allowedImageTypes) || !in_array($photo3_type, $allowedImageTypes)) {
        exit('Le type de fichier d\'une ou plusieurs photos n\'est pas autorisé. Seules les images JPEG, PNG et GIF sont autorisées.');
    }


    // Enregistrement des photos dans le dossier d'upload/occasions
    $destination_photo_principale = $_SERVER['DOCUMENT_ROOT'] . '/cuisine/upload/occasions/' . $photo_principale_name;
    move_uploaded_file($photo_principale_tmp_name, $destination_photo_principale);

    $destination_photo1 = $_SERVER['DOCUMENT_ROOT'] . '/cuisine/upload/occasions/' . $photo1;
    move_uploaded_file($photo1_tmp_name, $destination_photo1);

    $destination_photo2 = $_SERVER['DOCUMENT_ROOT'] . '/cuisine/upload/occasions/' . $photo2;
    move_uploaded_file($photo2_tmp_name, $destination_photo2);

    $destination_photo3 = $_SERVER['DOCUMENT_ROOT'] . '/cuisine/upload/occasions/' . $photo3;
    move_uploaded_file($photo3_tmp_name, $destination_photo3);
    // Insertion des données dans la table "voitures"
    $stmt_voitures = $pdo->prepare('INSERT INTO voitures (marque, modele, annee, kilometrage, prix, carburant, transmission, couleur, description, photo, photo1, photo2, photo3,equipement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt_voitures->execute([$marque, $modele, $annee, $kilometrage, $prix, $carburant, $transmission, $couleur, $description, $photo_principale_name, $photo1, $photo2, $photo3, $detail]);

    // Récupération de l'ID de la voiture insérée
    $voiture_id = $pdo->lastInsertId();

    // Affichage d'un message de confirmation
    echo "La voiture a bien été enregistrée dans la base de données avec ses photos de galerie et son équipement.";
    header('Location: ..\Pages\tableauBord.php');
    exit();
}
