<?php
class Contact
{
    static public function create($contact)
    {
        $sql = "INSERT INTO contact(nom,prenom,email,telephone,message)
        VALUES(:nom,:prenom,:email,:telephone,:message)";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':nom', $contact['nom'],PDO::PARAM_STR);
        $pdo->bindParam(':prenom', $contact['prenom'],PDO::PARAM_STR);
        $pdo->bindParam(':email', $contact['email'],PDO::PARAM_STR);
        $pdo->bindParam(':telephone', $contact['telephone'],PDO::PARAM_STR);
        $pdo->bindParam(':message', $contact['message'],PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function readAll()
    {
        $sql = "SELECT * FROM contact";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
}
