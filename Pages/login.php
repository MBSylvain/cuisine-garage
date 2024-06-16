<?php
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password1 = $_POST['mdp'];
    // Connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=gara_vparot;charset=utf8';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }

    $email = $_POST['email'];

    // Récupération des données des utilisateurs depuis la table "connexion"
    $stmt_users = $pdo->prepare('SELECT * FROM connexion WHERE email = :email');
    $stmt_users->execute(['email' => $email]);
    $user = $stmt_users->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    if ($user) {
        // Vérifier le mot de passe. Utilisez password_verify si vous avez haché les mots de passe
        if ($password1 == $user['mdp']) {
            // Démarrer la session utilisateur
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            echo 'Bonjour, ' . htmlspecialchars($user['nom']);

            // Rediriger en fonction du rôle de l'utilisateur
            if ($user['role'] == 'admin') {
                header("Location: tableauBord.php");
                exit();
            } elseif ($user['role'] == 'user') { // Correction de l'erreur syntaxique
                header("Location: tableauBordEmplo.php");
                exit();
            } else {
                // Redirige vers la page de connexion si le rôle n'est pas défini
                header('Location: login.php');
                exit();
            }
        } else {
            echo "Vous aller être redigié vers la page d'accueil.";
            header("Location: index.php");
            exit();
        }
    } else {
        echo "Aucun compte trouvé avec cet email.";
        header("Location: index.php");
    }
}
?>
<?php include_once('C:\xampp\htdocs\cuisine\includes\header.php') ?>
<div class="connexion-card">
    <div class="connexion">
        <form class="form-signin mb-4 sm" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Password" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <input type="submit" name="submit" value="Envoyer" class="boutton-contact">
        </form>
    </div>
</div>
<?php include_once('C:\xampp\htdocs\cuisine\includes\footer.php') ?>