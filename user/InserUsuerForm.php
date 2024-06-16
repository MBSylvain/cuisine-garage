<?php // On crée la connexion à la bbd

try {
    $pdo = new PDO('mysql:dbname=gara_vparot;host=localhost', 'root', '');
} catch (PDOException $e) {
    // Gestion de l'exception
    echo 'Impossible de se connecter à la base de donnée';
}

?>

<main>
    <div class="connexion">
        <h1>Connexion</h1>
        <form class="formulaire" action="inserUserBack.php" method="post">

            <label for="nom">nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="Prenom">Prénom :</label>
            <input type="text" id="Prenom" name="Prenom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>


            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Ajouter un salarier</button>
        </form>
    </div>
</main>