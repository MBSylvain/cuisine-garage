<?php
include_once('C:\xampp\htdocs\cuisine\includes\header.php');
include('..\includes\connexionBDD.php');
include('..\includes\Donnée_prestation.php');
?>
<?php
while ($donnee = $listpresta->fetch()) { ?>
    <div class="card" style="width: 18rem;">
        <img src=<?= "upload/services/$nomImg" ?> class="card-img-top" alt="services">
        <div class="card-body">
            <p class="card-text"><?= $donnee['description'] ?></p>
        </div>
    <?php }
    ?>
    <?php include_once('C:\xampp\htdocs\cuisine\includes\footer.php');
