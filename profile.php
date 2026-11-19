<?php

include("./libs/lib_bdd.php");
include("./libs/lib_auth.php");
include("./libs/lib_token.php");



$pdo = getDB();

$username = $_POST["username"] ;

$email = $_POST["email"];

$password["password"];

$data = getPayloadJWT($_COOKIE["auth"]);

$idUser = $data["id_user"];

$rqt_username = "UPDATE users SET username = :username  WHERE id_user = :id_user";

$rqt_email = "UPDATE users SET email = :email  WHERE id_user = :id_user";

$rqt_password = "UPDATE users SET password = :pwd  WHERE id_user = :id_user";


$stmt = $pdo->prepare($rqt_username);
$stmt->execute([
        ":username" => $username,
        ":id_user" => $idUser
    ]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare($rqt_email);
$stmt->execute([
        ":email" => $email,
        ":id_user" => $idUser
    ]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare($rqt_password);
$stmt->execute([
        ":pwd" => $password,
        ":id_user" => $idUser
    ]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./includes/header.php'); ?>
    <title> Profile </title>
</head>
<body>
    <header>
        <?php require_once('./includes/navbar.php'); ?>
    </header>
    <main>
        <form method="POST">
            <input type="email" name="email" placeholder="Entrez votre email">
            <input type="email" name="email" placeholder="Entrez votre email">
            <input type="password" name="password" placeholder="Entrez votre mot de passe">
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>

