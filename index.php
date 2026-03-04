<?php
include('connexion.php');

$sql = "SELECT * FROM Marche";
$stmt = $connexion->query($sql);
$marches = $stmt->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MARCHE BENIN - Liste des Marchés</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
</div>

<div class="container mt-5 pt-5">
    <h4 class="pt-3 mb-3 text-primary fw-bold">
        Liste de tout les marchés
    </h4>
    <div class="row">

        <?php foreach($marches as $marche): ?>

            <div class="col-md-4 mb-4"> <!-- 3 cartes par ligne -->

                <div class="card h-100 shadow">

                    <img src="<?= $marche['image']; ?>" 
                         class="card-img-top" 
                         style="height:200px; object-fit:cover;">

                    <div class="card-body text-center">

                        <h5 class="card-title">
                            <?= $marche['nomMarche']; ?>
                        </h5>

                        <p class="card-text">
                            Capacité : <?= $marche['capacite']; ?> places
                        </p>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>