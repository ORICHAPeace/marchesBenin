<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "marchesbenin";

    $connexion = mysqli_connect($hostname, $username,$password);
    echo mysqli_error($connexion);
     mysqli_select_db($connexion, $database);

    if(!$connexion){
        die("Connexion échouée : " . mysqli_connect_error());
    }
?>