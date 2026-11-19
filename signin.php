<?php

include('./libs/lib_bdd.php');

$rqt = getDB()->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./includes/header.php'); ?>
    <title>Accueil</title>
</head>
<body>
    <header>
        <?php require_once('./includes/navbar.php'); ?>
    </header>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>