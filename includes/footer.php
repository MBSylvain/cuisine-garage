<?php
include('connexions\connexionHorraire.php');
?>
<footer class="py-5 border-top">
    <div class="row">
        <div class="col-5 col-md-4 mb-3">
            <h5>Liens</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-body-secondary">Accueil</a></li>
                <li class="nav-item mb-2"><a href="Voiture-filtre-modal.php" class="nav-link p-0 text-body-secondary">Nos Véhicules d'occasion</a></li>
                <li class="nav-item mb-2"><a href="contact.php" class="nav-link p-0 text-body-secondary">Contact</a></li>
                <li class="nav-item mb-2"><a href="Commentaire.php" class="nav-link p-0 text-body-secondary">Commentaires</a></li>
                <li class="nav-item mb-2"><a href="login.php" class="nav-link p-0 text-body-secondary">Se connecter</a></li>
            </ul>
        </div>

        <div class="col-6 col-md-4 mb-3">
            <h5>Adresse</h5>
            <ul class="nav flex-column">
                <address>
                    <p> 123 Rue des Mécaniciens, Paris</p>
                    <p>Téléphone : 0143010100</p>
                    <p>Email : contact@garage-vparot.com</p>
                </address>
            </ul>
        </div>

        <div class="col-6 col-md-4 mb-3">
            <h5>Horraires d'ouvertures</h5>
            <ul class="nav flex-column">
                <section id="horraire" class="horraire" style="font-size: 12px;">

                    <?php foreach ($horaires as $horaire) : ?>
                        <?php if ($horaire['ferme'] == '0') : ?>
                            <ul class="listeH">
                                <?= $horaire['jour'] ?>: <?= $horaire['ouverture_matin'] ?> à <?= $horaire['fermeture_matin'] ?> - <?= $horaire['ouverture_apresmidi'] ?> à <?= $horaire['fermeture_apresmidi'] ?>
                            </ul>
                        <?php else : ?>
                            <p> <?= $horaire['jour'] ?>- Nous sommes fermés</p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </section>
            </ul>
        </div>

    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>© 2024 Osmose factory, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
            <li class="ms-3">
                <img class="link-body-emphasis" src="../logo/twitter-x.svg" alt="twitter">
            </li>
            <li class="ms-3"><img class="link-body-emphasis" src="../logo/instagram.svg" alt="instagram">
            </li>
            <li class="ms-3"><img class="link-body-emphasis" src="../logo/facebook.svg" alt="facebook">
            </li>
        </ul>
    </div>
</footer>

</body>

</html>