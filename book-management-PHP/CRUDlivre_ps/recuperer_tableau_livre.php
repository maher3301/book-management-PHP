<?php
include('livre.php');

$livre_instance = new Livre();
$livres = array();

$sql = "SELECT * FROM livres";
$resultat = $livre_instance->conn->query($sql);

if ($resultat) {
    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $livres[] = $row;
    }
} else {
    echo "Erreur lors de la récupération des livres : " . $livre_instance->conn->errorInfo()[2];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajout de styles CSS supplémentaires pour centrer le tableau */
        .container {
            margin-top: 50px;
        }
        /* Style pour le footer */
        footer {
            background-color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">ESSAT Formulaire</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="ajouter_livre.php">Formulaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recuperer_tableau_livre.php">Liste des livres</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <h2 class="text-center">Liste des livres</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livres as $livre) { ?>
                    <tr>
                        <td class="text-center"><?php echo $livre['id']; ?></td>
                        <td><?php echo $livre['auteur']; ?></td>
                        <td><?php echo $livre['date']; ?></td>
                        <td><?php echo $livre['categorie']; ?></td>
                        <td class="text-center">
                            <form action="modifier_livre.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $livre['id']; ?>">
                            </form>
                            <!-- Formulaire de modification avec bouton de soumission -->
                            <form action="update_livre.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $livre['id']; ?>">
                                <input type="text" name="auteur" value="<?php echo $livre['auteur']; ?>" placeholder="Auteur" class="form-control">
                                <input type="date" name="date" value="<?php echo $livre['date']; ?>" placeholder="Date" class="form-control">
                                <input type="text" name="categorie" value="<?php echo $livre['categorie']; ?>" placeholder="Catégorie" class="form-control">
                                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                            </form>
                            <form action="supprimer_livre.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $livre['id']; ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<footer>
    <div class="container">
        <p>&copy; 2024 Maher. Tous droits réservés.</p>
    </div>
</footer>
</body>
</html>
