<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=gara_vparot;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation et exécution de la requête pour récupérer les données des voitures
        $stmt_voitures = $pdo->prepare('SELECT * FROM voitures WHERE id = ?');
        $stmt_voitures->execute([$id]);

        // Récupération des données
        $voitures = $stmt_voitures->fetchAll(PDO::FETCH_ASSOC);

        // Traitement des données récupérées
        // Par exemple, vous pouvez afficher les données des voitures

        foreach ($voitures as $voiture) {
            echo 'ID: ' . htmlspecialchars($voiture['id']) . '<br>';
            echo 'Marque: ' . htmlspecialchars($voiture['marque']) . '<br>';
            echo 'Modèle: ' . htmlspecialchars($voiture['modele']) . '<br>';
            echo 'Prix: ' . htmlspecialchars($voiture['prix']) . '<br>';
            echo '<hr>';
?>
            <div id="gallery-container" class="gallery-container">
                <img class="img-galerie" src="/cuisine/upload/occasions/<?= htmlspecialchars($voiture['photo1']) ?>" alt="Photo de la galerie">
                <img class="img-galerie" src="/cuisine/upload/occasions/<?= htmlspecialchars($voiture['photo2']) ?>" alt="Photo de la galerie">
                <img class="img-galerie" src="/cuisine/upload/occasions/<?= htmlspecialchars($voiture['photo3']) ?>" alt="Photo de la galerie">
            </div>
        <?php
        }
        ?>

<?php

    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    echo 'Aucun identifiant fourni.';
}
?>
<script>
    function toggleGallery() {
        const gallery = document.getElementById('gallery-container');
        if (gallery.style.display === 'none') {
            gallery.style.display = 'block'; // Affiche la galerie
        } else {
            gallery.style.display = 'none'; // Masque la galerie
        }
    }
</script>