<?php
// Limite de taille maximale en octets (par exemple, 5 Mo)
$maxFileSize = 5 * 1024 * 1024;

// Types de fichiers d'images autorisés
$allowedImageTypes = array(
    IMAGETYPE_JPEG,
    IMAGETYPE_PNG,
    IMAGETYPE_GIF,

);

if (isset($_POST['submit']) && isset($_FILES['photo'])) {

    // Récupération des informations sur l'image
    $prest = $_POST['prestation'];
    $details = $_POST['detail'];
    $image_name = $_FILES['photo']['name'];
    $image_tmp_name = $_FILES['photo']['tmp_name'];
    $image_error = $_FILES['photo']['error'];
    $image_size = $_FILES['photo']['size'];

    // Vérification de la taille du fichier
    if ($image_size > $maxFileSize) {
        exit('La taille du fichier dépasse la limite autorisée.');
    }

    // Vérification du type de fichier
    $imageType = exif_imagetype($image_tmp_name);
    if (!in_array($imageType, $allowedImageTypes)) {
        exit('Le type de fichier n\'est pas autorisé. Seules les images JPEG, PNG et GIF sont autorisées.');
    }

    if ($image_error === 0) {
        // Enregistrement de l'image dans le dossier d'uplaods
        $destination =  $_SERVER['DOCUMENT_ROOT'] . '/cuisine' . '/' . 'uplaods/' . $image_name;

        move_uploaded_file($image_tmp_name, $destination);
        echo "L'image a bien été enregistrée";
    } else {
        exit('Erreur lors du téléchargement du fichier');
    }
}


// Récupérer les données soumises
$id = $_POST['id'];
echo "Identifiant à mettre à jour : $id";
$prest = $_POST['prestation'];
$details = $_POST['detail'];
$image_name = $_FILES['photo']['name'];
$image_tmp_name = $_FILES['photo']['tmp_name'];
$image_error = $_FILES['photo']['error'];
$image_size = $_FILES['photo']['size'];


// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');


// Préparation et exécution de la requête de mise à jour
$stmt_update = $pdo->prepare('UPDATE presta SET prestation = ?, detail = ?, image = ?, size=? WHERE id = ?');
$stmt_update->execute([$prest, $details, $image_name, $image_size, $id]);

if ($stmt_update) {
    echo $message = 'Les informations ont été mises à jour avec succès.';
} else {
    echo $message = 'Erreur lors de la mise à jour des informations.';
}
