<?php include_once('C:\xampp\htdocs\cuisine\includes\header.php') ?>
<main>
    <section id="accueil">
        <h2>Bienvenue chez Garage V. PARROT</h2>
        <p>Bienvenue chez Garage V PARROT, votre partenaire de confiance pour l'entretien et la réparation automobile de qualité. Forts de deux décennies d'expérience, nous mettons notre savoir-faire au service de votre véhicule, assurant un service fiable, transparent et professionnel. Notre équipe de mécaniciens chevronnés est dévouée à vous offrir la meilleure expertise, qu'il s'agisse d'une simple vidange, d'un diagnostic électronique pointu ou de la recherche de votre prochaine voiture d'occasion de qualité. Chez Garage V. PARROT, la route vers la tranquillité d'esprit commence ici. Confiez-nous votre véhicule, et découvrez le plaisir de rouler en toute confiance.</p>
    </section>
    <section class="group">
        <?php include('C:\xampp\htdocs\cuisine\includes\connexions\connexionPrestation.php') ?>
        <?php
        while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            $destination = '\cuisine\uplaods' . DIRECTORY_SEPARATOR . $row['image']; ?>

            <div class="carte">
                <img class="imgcarte" src="<?php echo $destination ?>" alt="services">
                <div calss="carteTexte">
                    <p class="carte-text"><?= $row['detail'] ?></p>
                </div>
            </div>

        <?php } ?>
    </section>

    <div class="commentaire">
        <?php
        include('C:\xampp\htdocs\cuisine\includes\connexions\connexionCommentaire.php');
        ?>
        <h2 class="text-center my-4">Témoignages de nos clients</h2>

        <div id="carouselExample" class="carousel slide">

            <div class="carousel-inner">
                <?php
                $isActive = true;
                foreach ($comments as $comment) : ?>

                    <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                        <div class="card m-4 event-card" id="testimonial">
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    <h3><?= $comment['nom'] ?> <?= $comment['prenom'] ?></h3>
                                </h4>
                                <p class="card-text">
                                    <?= $comment['commentaire'] ?>.
                                </p>
                                <p class="note-5">La note laissée est de:
                                    Note :<?= $comment['note'] ?>/5<br>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                    $isActive = false;
                endforeach; ?>

            </div>

            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>

    </div>
    </div>
</main>
<?php include_once('C:\xampp\htdocs\cuisine\includes\footer.php') ?>