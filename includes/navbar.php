<?php
$payload = getPayloadJWT($_COOKIE['auth']);
$id_user = $payload["id_user"];
$pdo = getDB();

try{
    $rqt = "SELECT * FROM users WHERE id_user = :id_user";

    $stmt = $pdo->prepare($rqt);
    $stmt->execute([
        ":id_user" => $id_user
    ]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dataUser = $result;
}
catch(PDOException $error){
    addLog($error->getMessage(), "WARN");
}

?>

<div id="navbar">
    <div id="side">
        <div id="channel">
            <a href="private.php" class="channel">
                <img src="./IMG/icon.png" alt="icon" class="channel">
            </a>
            <a href="private.php" class="channel">
                <img src="./IMG/icon.png" alt="icon" class="channel">
            </a>
            <a href="private.php" class="channel">
                <img src="./IMG/icon.png" alt="icon" class="channel">
            </a>
            <a href="private.php" class="channel">
                <img src="./IMG/icon.png" alt="icon" class="channel">
            </a>
            <a href="private.php" class="channel">
                <img src="./IMG/icon.png" alt="icon" class="channel">
            </a>
            <a href="private.php" class="channel">
                <img src="./IMG/icon.png" alt="icon" class="channel">
            </a>
            
        </div>
        <hr>
        <div id="private">
            
        </div>
    </div>
    <div id="profile">
        <div id="info">
            <img src="<?= $dataUser["picture_url"] ?>" alt="user_picture" id="user"/>
            <div>
                <p><strong><?= $dataUser["username"] ?></strong></p>
                <p>Connecté</p>
            </div>
        </div>
        
        <a href="./profile.php" id="settings">
            <i class="fa-solid fa-gear"></i>
        </a>
    </div>
</div>


<script src="./JS/main.js"></script>