<?php
class Horaire
{

    static public function readAll()
    {
        $sql = "SELECT * FROM horaire";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function read($id)
    {
        try {
            $sql = "SELECT * FROM horaire WHERE id=:id";
            $pdo = Connexion::Connect()->prepare($sql);
            $pdo->execute(array(":id" => $id));
            $horaire = $pdo->fetch(PDO::FETCH_ASSOC);
            return $horaire;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function update($horaire)
    {
        $sql = "UPDATE horaire SET matinee=:matinee, apresmidi=:apresmidi WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':id', $horaire['id'], PDO::PARAM_INT);
        $pdo->bindParam(':matinee', $horaire['matinee'], PDO::PARAM_STR);
        $pdo->bindParam(':apresmidi', $horaire['apresmidi'], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
