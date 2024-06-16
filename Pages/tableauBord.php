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
    <div class="d-flex justify-content-between">
        <div class="col-md-2 sidebar d-flex flex-column pb-3 mb-3">
            <h2 class="text-white">Menu</h2>
            <a class="lines-tdb" href="#prestations">Prestations</a>
            <a class="lines-tdb" href="#occasions">Occasions</a>
            <a class="lines-tdb" href="#horaires">Horaires</a>
            <a class="lines-tdb" href="#commentaires">Commentaires</a>
            <a class="lines-tdb" href="#employers">Employés</a>
            <a class="lines-tdb" href="..\includes\deconnexionTDB.php">Se déconnecter</a>
        </div>

        <div class="main-content flex-grow-1 p-3">
            <h1>Tableau de Bord de l'Administrateur</h1>
            <section id="prestations" class="row border-top">
                <div class="divgauche">
                    <h2>Prestations</h2>
                    <?php include_once('C:\xampp\htdocs\cuisine\prestation\inserPrestaF.php') ?>
                </div>
                <div class="divdroite">
                    <p>Liste des prestations</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\prestation\listpresta-simple.php') ?>
                </div>
            </section>
            <section id="occasions" class="row border-top">
                <div class="divgauche">
                    <?php include_once('C:\xampp\htdocs\cuisine\occasions\formajoutvoiture.php') ?>
                </div>

            </section>
            <section id="horaires" class="row border-top">
                <div class="divgauche">
                    <h2>Horaires</h2>
                    <?php include_once('C:\xampp\htdocs\cuisine\horraires\affichehorraire.php') ?>
                </div>

            </section>
            <section id="commentaires" class="row border-top">
                <div class="divgauche">
                    <h2>Commentaires</h2>
                    <?php include_once('C:\xampp\htdocs\cuisine\commentaires\moderationcom.php') ?>
                </div>

            </section>
            <section id="employers" class="row border-top">
                <div class="divgauche">
                    <h2>Employés</h2>
                    <p>création d'un compte employés...</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\user\InserUsuerForm.php') ?>
                </div>
                <div class="divdroites">
                    <p>Liste des salariers</p>
                    <?php include_once('C:\xampp\htdocs\cuisine\user\listeSalarie.php') ?>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>