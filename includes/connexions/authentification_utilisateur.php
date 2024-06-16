<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['mdp'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "votre_nom_utilisateur";
    $password_db = "votre_mot_de_passe";
    $dbname = "votre_base_de_donnees";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
        // Définition de l'attribut PDO pour rapporter les erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête préparée pour récupérer l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM connexion WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['mdp'])) {
            // Démarrer la session utilisateur
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Rediriger en fonction du rôle de l'utilisateur
            if ($user['role'] == 'admin') {
                header("Location: page_admin/tableauBord.php");
                exit();
            } else {
                header("Location: page_utilisateur/tableauBord.php");
                exit();
            }
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucune donnée postée.";
}
