<?php
class Service
{
    static public function create($service)
    {
        $destinationDirectory = '/garage-automobile/public/images/services/';
        $dossierTempo = $_FILES['image']['tmp_name'];
        $dossierSite = $destinationDirectory . basename($_FILES['image']['name']);
        if (file_exists($dossierTempo)) {
            move_uploaded_file($dossierTempo, $dossierSite);
        }
        $sql = 'INSERT INTO service (nom, description, image) 
                        VALUES (:nom, :description, :image)';
        $Connexion = Connexion::Connect();
        $pdo = $Connexion->prepare($sql);
        $pdo->bindParam(':nom', $service['nom'],PDO::PARAM_STR);
        $pdo->bindParam(':description', $service['description'],PDO::PARAM_STR);
        $pdo->bindParam(':image', $dossierSite,PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function readAll()
    {
        $sql = "SELECT * FROM service";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function read($id)
    {
        try {
            $sql = "SELECT * FROM service WHERE id=:id";
            $pdo = Connexion::Connect()->prepare($sql);
            $pdo->execute(array(":id" => $id));
            $service = $pdo->fetch(PDO::FETCH_ASSOC);
            return $service;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function update($service)
    {
        $sql = "UPDATE service SET nom=:nom, description=:description WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':id', $service['id'],PDO::PARAM_INT);
        $pdo->bindParam(':nom', $service['nom'],PDO::PARAM_STR);
        $pdo->bindParam(':description', $service['description'],PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
 
    static public function delete($id)
    {

        $pdo1 = Connexion::Connect()->prepare("DELETE FROM service where id=:id");
        $pdo1->bindParam(':id', $id,PDO::PARAM_INT);
        if ($pdo1->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
