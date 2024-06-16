<?php
if (isset($_POST['submit'])) {
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    // Requête pour vérifier l'utilisateur
    $query = "SELECT email, mdp FROM connexion WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Vérifier le mot de passe
        if ($password == $user['mdp']) { // Remplacez cette ligne par password_verify($password, $user['password']) si vous utilisez des mots de passe hachés
            // Démarrer la session utilisateur
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            echo ($email);
            // Rediriger en fonction du rôle de l'utilisateur
            if ($user['role'] == 'admin') {
                header("Location: page_admin/tableauBord.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun compte trouvé avec cet email.";
    }
}
