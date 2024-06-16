<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="C:\xampp\htdocs\cuisine\assets\CSS\tableauBord.css">
</head>

<body>
    <div class="d-flex">
        <div class="sidebar d-flex flex-column p-3">
            <h2 class="text-white">Menu</h2>
            <a href="#occasions">Occasions</a>
            <a href="#commentaires">Commentaires</a>
            <a href="..\includes\deconnexionTDB.php">Se déconnecter</a>
        </div>

        <div class="main-content flex-grow-1 p-3">
            <h1>Tableau de Bord des équipes</h1>
            <section id="occasions" class="row">
                <div class="divgauche">
                    <h2>Occasions</h2>
                    <p>Contenu relatif aux occasions...</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\occasions\formajoutvoiture.php') ?>
                </div>
                <div class="divdroite">
                    <p>Liste des occasions</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\occasions\FenetrreOccassion.php') ?>
                </div>
            </section>
            <section id="commentaires" class="row">
                <div class="divgauche">
                    <h2>Commentaires</h2>
                    <p>Contenu relatif aux commentaires...</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\commentaires\moderationcom.php') ?>
                </div>
                <div class="divdroite">
                    <p>Liste des commentaires</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\commentaires\compublic.php') ?>
                </div>
            </section>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>