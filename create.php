<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un marché</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter un nouveau marché</h4>
        </div>

        <div class="card-body">

            <form action="store.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Nom du marché *</label>
                    <input type="text" name="nomMarche" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacité du marché *</label>
                    <input type="number" name="capacite" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ville *</label>
                    <select name="ville" class="form-select" required>
                        <option value="">-- Sélectionnez une ville --</option>
                        <?php
                        require_once("connexion.php");
                        $result = $connexion->query("SELECT idVille, nomVille FROM ville ORDER BY nomVille");
                        while($ville = $result->fetch_assoc()){
                            echo '<option value="'.$ville['idVille'].'">'.htmlspecialchars($ville['nomVille']).'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>