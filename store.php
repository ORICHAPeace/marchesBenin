<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomMarche  = $_POST['nomMarche'];
    $description = $_POST['description'];
    $capacite   = $_POST['capacite'];
    $adresse    = $_POST['adresse'];
    $telephone  = $_POST['telephone'];
    $villeId    = $_POST['ville']; // idVille depuis le select

    if(empty($villeId)){
        die("Veuillez sélectionner une ville valide.");
    }

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        $imageName = $_FILES['image']['name'];
        $tmpName   = $_FILES['image']['tmp_name'];
        $chemin = "image/" . time() . "_" . basename($imageName);
        if(!move_uploaded_file($tmpName, $chemin)){
            die("Erreur lors de l'upload de l'image.");
        }
    } else {
        $chemin = null;
    }

    $sql = "INSERT INTO Marche (nomMarche, description, capacite, adresse, telephone, image, ville)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connexion->prepare($sql);
    if($stmt === false){
        die("Erreur de préparation : " . $connexion->error);
    }

    $stmt->bind_param("ssisssi", $nomMarche, $description, $capacite, $adresse, $telephone, $chemin, $villeId);

    if($stmt->execute()){
        header("Location: index.php");
        exit();
    } else {
        die("Erreur lors de l'insertion : " . $stmt->error);
    }

    $stmt->close();
}

$connexion->close();
?>