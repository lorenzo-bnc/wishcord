<?php
include("./libs/lib_auth.php");
verifCnx();

if(
    isset($_POST["email"]) ||
    isset($_POST["username"]) ||
    isset($_POST["password"])
){
    try{
        $champs_a_update = "";
        $flag = [];

        if(isset($_POST['email']) && $_POST['email'] != ""){
            $champs_a_update .= "email = :email,";
            $flag[":email"] = $_POST['email'];
        };

        if(isset($_POST['password']) && $_POST['password'] != ""){
            $champs_a_update .= "password = SHA2(:pwd, 256),";
            $flag[":pwd" ] = $_POST['password'];
        };

        if(isset($_POST['username']) && $_POST['username'] != ""){
            $champs_a_update .= "username = :username,";
            $flag[":username"] = $_POST['username'];
        };

        $champs_a_update = rtrim($champs_a_update, ',');

        $flag[':id_user'] = $id_user;
    
        $rqt = "UPDATE users
                SET $champs_a_update
                WHERE id_user = :id_user";

        $stmt = $pdo->prepare($rqt);
        $stmt->execute($flag);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        header("Location: profile.php");
    }
    catch(PDOException $error){
        addLog($error->getMessage(), "WARN");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./includes/header.php'); ?>
    <title> Profile </title>
</head>
<body>
    <div id="content">
        <header>
            <?php require_once('./includes/navbar.php'); ?>
        </header>
        <main>
            <form method="POST">
                <h1>Modifier vos informations</h1>
                <input type="email" name="email" placeholder="<?= $dataUser["email"] ?>">
                <input type="text" name="username" placeholder="<?= $dataUser["username"] ?>">
                <input type="password" name="password" placeholder="*********">
                <button type="submit">Enregistrer</button>
            </form>
        </main>
    </div>
    <footer>

    </footer>
</body>
</html>

