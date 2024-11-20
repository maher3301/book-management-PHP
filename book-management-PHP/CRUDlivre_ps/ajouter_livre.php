<?php
if (isset($_POST['submit'])) {
    include('livre.php');
    $livre = new Livre();
    $livre->auteur = $_POST['auteur'];
    $livre->date = $_POST['date'];
    $livre->categorie = $_POST['categorie'];
    if ($livre->create_livre())
        echo 'Livre ajouté avec succès';
    else
        echo 'Échec de l\'ajout du livre';
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ajouter un livre</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ma Librairie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ajouter_livre.php">Ajouter un livre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recuperer_tableau_livre.php">Liste des livres</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Ajouter un livre
                    </div>
                    <div class="card-body">
                        <form action="ajouter_livre.php" method="POST">
                            <div class="form-group">
                                <label for="auteur">Auteur</label>
                                <input type="text" class="form-control" id="auteur" name="auteur" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <input type="text" class="form-control" id="categorie" name="categorie" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <span class="text-muted">&copy; 2024 Ma Librairie. Tous droits réservés.</span>
        </div>
    </footer>

    <!-- Bouton pour afficher la liste des livres -->
    <div class="fixed-bottom m-3 text-center">
        <a href="recuperer_tableau_livre.php" class="btn btn-info">Voir la liste des livres</a>
    </div>

</body>

</html>
