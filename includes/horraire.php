<section id="horraire" class="horraire" style="font-size: 12px;">
    <h6 class="titre-footer">Horraires d'ouverture</h6>
    <?php foreach ($horaires as $horaire) : ?>
        <?php if ($horaire['ferme'] == '0') : ?>
            <ul class="listeH">
                <?= $horaire['jour'] ?>: <?= $horaire['ouverture_matin'] ?> à <?= $horaire['fermeture_matin'] ?> - <?= $horaire['ouverture_apresmidi'] ?> à <?= $horaire['fermeture_apresmidi'] ?>
            </ul>
        <?php else : ?>
            <p>Nous sommes fermés</p>
        <?php endif; ?>
    <?php endforeach; ?>
</section>