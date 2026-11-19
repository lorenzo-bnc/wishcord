<?php
include("./libs/lib_bdd.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    try{
        $pdo = getDB();

        $email = $_POST["email"];
        $password = $_POST["password"];

        $rqt = "SELECT COUNT(*) AS nb, id_user FROM users WHERE email = :email AND password = SHA2(:pwd, 256)";

        $stmt = $pdo->prepare($rqt);
        $stmt->execute([
            ":email" => $email,
            ":pwd" => $password
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result["nb"] == 1){
            echo "connexion réussie";
        }
        else{
            echo "connexion échouée";
        }
    }
    catch(PDOException $error){
        $error->getMessage();
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./includes/header.php'); ?>
    <title>Page de connexion</title>
</head>
<body>
    <header>
        <?php require_once('./includes/navbar.php'); ?>
    </header>
    <main>
        <form method="POST">
            <input type="email" name="email" placeholder="Entrez votre email">
            <input type="password" name="password" placeholder="Entrez votre mot de passe">
            <input type="submit">
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>