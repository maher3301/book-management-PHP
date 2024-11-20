<?php
include('livre.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $livre = new Livre();
    
    if ($livre->delete_livre($id)) {
        header("Location: recuperer_tableau_livre.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du livre";
    }
}
?>
