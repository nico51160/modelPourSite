<?php
class Temoignage
{
    static public function readAll()
    {
        $sql = "SELECT * FROM temoignage";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
    
    static public function create($temoignage)
    {
        $status = 0;
        $sql = "INSERT INTO temoignage(nom,commentaire,note,status)
        VALUES(:nom,:commentaire,:note,:status)";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':nom', $temoignage['nom'],PDO::PARAM_STR);
        $pdo->bindParam(':commentaire', $temoignage['commentaire'],PDO::PARAM_STR);
        $pdo->bindParam(':note', $temoignage['note'],PDO::PARAM_INT);
        $pdo->bindParam(':status', $status,PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function accept($id)
    {
        $status = 1;
        $sql = "UPDATE temoignage SET status=:status WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':id', $id,PDO::PARAM_INT);
        $pdo->bindParam(':status',  $status,PDO::PARAM_INT);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }


}
