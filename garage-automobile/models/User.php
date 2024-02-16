<?php
class User
{
    static public function create($user)
    {
        $sql = "INSERT INTO utilisateurs(nom,prenom,email,role,login,password,telephone)
        VALUES(:nom,:prenom,:email,:role,:login,:password,:telephone)";
        $role = 'Employe';
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':nom', $user['nom'], PDO::PARAM_STR);
        $pdo->bindParam(':prenom', $user['prenom'], PDO::PARAM_STR);
        $pdo->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $pdo->bindParam(':role', $role, PDO::PARAM_STR);
        $pdo->bindParam(':login', $user['login'], PDO::PARAM_STR);
        $pdo->bindParam(':password', $user['password'], PDO::PARAM_STR);
        $pdo->bindParam(':telephone', $user['telephone'], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    
    static public function read($user)
    {
        $id = $user['id'];
        try {
            $pdo = Connexion::Connect()->prepare("SELECT * FROM utilisateurs where id=:id");
            $pdo->execute(array(":id" => $id));
            $user = $pdo->fetch(PDO::FETCH_OBJ);
            return $user;
            $pdo = null;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function readAll()
    {
        $pdo = Connexion::Connect()->prepare("SELECT * FROM utilisateurs");
        $pdo->execute();
        return $pdo->fetchAll();
    }

    static public function update($user)
    {
        $sql = "UPDATE utilisateurs SET nom=:nom, prenom=:prenom, email=:email, login=:login, telephone=:telephone WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $pdo->bindParam(':nom', $user['nom'], PDO::PARAM_STR);
        $pdo->bindParam(':prenom', $user['prenom'], PDO::PARAM_STR);
        $pdo->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $pdo->bindParam(':login', $user['login'], PDO::PARAM_STR);
        $pdo->bindParam(':telephone', $user['telephone'], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function delete($id)
    {
        try {
            $pdo = Connexion::Connect()->prepare("DELETE FROM utilisateurs where id=:id");
            $pdo->execute(array(":id" => $id));
            if ($pdo->execute()) {
                return 'ok';
            }
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function login($login)
    {
        try {
            $pdo = Connexion::Connect()->prepare("SELECT * FROM utilisateurs where login= :login");
            $pdo->bindParam(':login', $login);
            $pdo->execute();
            $user = $pdo->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function getPhone()
    {
        $role =  'Administrateur';
        try {
            $pdo = Connexion::Connect()->prepare("SELECT telephone FROM utilisateurs where role=:role");
            $pdo->execute(array(":role" => $role));
            $user = $pdo->fetch(PDO::FETCH_ASSOC);
            return $user['telephone'];
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function getPassword($id)
    {
        try {
            $pdo = Connexion::Connect()->prepare("SELECT password FROM utilisateurs where id=:id");
            $pdo->execute(array(":id" => $id));
            $user = $pdo->fetch(PDO::FETCH_OBJ);
            return $user->password;
            $pdo = null;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function changePassword($user)
    {
        $query = "UPDATE utilisateurs SET password=:password WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($query);
        $pdo->bindParam(':id', $user['id'], PDO::PARAM_STR);
        $pdo->bindParam(':password', MD5($user['password']), PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
