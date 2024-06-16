<?php
$stmt_select = $pdo->prepare('SELECT prestation, id, detail, image, size FROM presta');
$stmt_select->execute();
