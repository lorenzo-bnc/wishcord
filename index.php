<?php

$connexion = mysqli_connect("localhost","root","","wishcord");

$email = $_POST["email"];
$pswd = $_POST["pswd"];

$sql = "SELECT COUNT(*) AS nb FROM users WHERE email = '$email' AND pswd = '$pswd'";





?>