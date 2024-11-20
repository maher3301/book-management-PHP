<?php
class Livre
{  
    public $id, $auteur, $date, $categorie;
    public $conn;

    private $serv = 'localhost', $user = 'root', $pass = '', $bdname = 'livre_db';

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->serv;dbname=$this->bdname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function create_livre()
    {
        $req = "INSERT INTO livres (auteur, date, categorie) VALUES (:auteur, :date, :categorie)";
        $stmt = $this->conn->prepare($req);
        return $stmt->execute(array(
            ':auteur' => $this->auteur,
            ':date' => $this->date,
            ':categorie' => $this->categorie
        ));
    }

    public function delete_livre($id)
    {
        $req = "DELETE FROM livres WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        return $stmt->execute(array(':id' => $id));
    }

    public function update_livre($id, $auteur, $date, $categorie)
    {
        $req = "UPDATE livres SET auteur = :auteur, date = :date, categorie = :categorie WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        return $stmt->execute(array(
            ':id' => $id,
            ':auteur' => $auteur,
            ':date' => $date,
            ':categorie' => $categorie
        ));
    }
    
    public function edit($id)
    {
        $req = "SELECT * FROM livres WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
