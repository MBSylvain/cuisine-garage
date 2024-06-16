<?php
// ...

// Limite de taille maximale en octets (par exemple, 5 Mo)
$maxFileSize = 5 * 1024 * 1024;

// Types de fichiers d'images autorisés
$allowedImageTypes = array(
  IMAGETYPE_JPEG,
  IMAGETYPE_PNG,
  IMAGETYPE_GIF,
  // Ajoutez d'autres types d'images autorisés au besoin
);

if (isset($_POST['submit']) && isset($_FILES['photo'])) {

  // Récupération des informations sur l'image
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
    // Enregistrement de l'image dans le dossier d'uploads
    $destination =  $_SERVER['DOCUMENT_ROOT'] . '/cuisine' . '/' . 'uplaods/' . $image_name;

    move_uploaded_file($image_tmp_name, $destination);
    echo "L'image a bien été enregistrée";
  } else {
    exit('Erreur lors du téléchargement du fichier');
  }
}

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

// Récupération des données du formulaire et des détails de l'image
$prest = $_POST['prestation'];
$details = $_POST['detail'];
$image_tmp_name = $_FILES['photo']['tmp_name'];
$image_tmp_size = $_FILES['photo']['size'];
$image_name = $_FILES['photo']['name'];

// Préparation et exécution de la requête SQL pour insérer les données dans la base de données
$stmt = $pdo->prepare('INSERT INTO presta (prestation, detail, image, size) VALUES(?, ?, ?, ?)');
$stmt->execute([$prest, $details, $image_name, $image_tmp_size]);

// Affichage d'un message de confirmation
if ($stmt) {
  echo "Votre prestation a bien été enregistrée dans la base de données";
} else {
  echo "Il y a eu une erreur lors de l'enregistrement de votre prestation";
}
header('Location: ..\Pages\tableauBord.php');
exit();
