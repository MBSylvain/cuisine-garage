<?php
session_start();

// Vider toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, utilisez session_destroy() après avoir vidé les variables de session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou une autre page
header("Location: ..\Pages\index.php");
exit();
