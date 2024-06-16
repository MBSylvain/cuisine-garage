<?php
// On Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // On Récupére les données du formulaire
    $bdd = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');

    // On fait la requête SQL d'insertion
    $stmt = $bdd->prepare("INSERT INTO horaires (jour, ouverture_matin, fermeture_matin, ouverture_apresmidi, fermeture_apresmidi, ferme) VALUES (?, ?, ?, ?, ?, ?)");

    // Parcourir les jours de la semaine
    $jours_semaine = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    foreach ($jours_semaine as $jour) {
        // Récupérer les données du formulaire pour ce jour avec la metohe post
        $ouverture_matin = $_POST[$jour . '_ouverture_matin'];
        $fermeture_matin = $_POST[$jour . '_fermeture_matin'];
        $ouverture_apresmidi = $_POST[$jour . '_ouverture_apresmidi'];
        $fermeture_apresmidi = $_POST[$jour . '_fermeture_apresmidi'];
        $ferme = isset($_POST[$jour . '_ferme']) ? 1 : 0;

        // la requête SQL d'insertion
        $stmt->execute([$jour, $ouverture_matin, $fermeture_matin, $ouverture_apresmidi, $fermeture_apresmidi, $ferme]);
    }

    // Fermer la connexion à la base de données
    $bdd = null;
    echo "Les horaires ont été enregistrés avec succès.";
}
header('Location: ..\Pages\tableauBord.php');
exit();
