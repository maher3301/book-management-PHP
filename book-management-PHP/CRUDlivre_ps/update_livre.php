<?php
include('livre.php');

header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $auteur = htmlspecialchars($_POST['auteur']);
        $date = htmlspecialchars($_POST['date']);
        $categorie = htmlspecialchars($_POST['categorie']);
        
        $livre = new Livre();
        $sql = "UPDATE livres SET auteur = :auteur, date = :date, categorie = :categorie WHERE id = :id";
        $stmt = $livre->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Livre mis à jour avec succès";
        } else {
            echo "Erreur lors de la mise à jour du livre";
            error_log("Erreur lors de la mise à jour du livre : " . $stmt->errorInfo()[2], 0);
        }
    } else {
        echo "ID du livre non spécifié";
    }
}
?>
