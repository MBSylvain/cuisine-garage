<?php
session_start();

if ($_SESSION['role'] === 'admin') {
    // Redirige vers le tableau de bord de l'administrateur si le rôle est 'admin'
    header('Location: tableauBord.php');
    exit();
} elseif ($_SESSION['role'] === 'user') {
    // Redirige vers le tableau de bord de l'utilisateur si le rôle est 'user'
    header('Location: tableauBordEmplo.php');
    exit();
} else {
    // Gère les autres rôles ou redirige vers une page par défaut
    header('Location: index.php');
    exit();
}
