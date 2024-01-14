<?php
class Valider {
    private $nom;
    private $prenom;
    private $email;
    private $msg;
    private $gtoken;

    private $nomOk;
    private $prenomOk;
    private $emailOk;
    private $msgOk;
    private $gtokenOk;

    public function __construct($nom, $prenom, $email, $msg, $gtoken) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->setMsg($msg);
        $this->setGtoken($gtoken);
    }

    private function setNom($nom) {
        $this->nom = $nom;
    }
    private function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    private function setEmail($email) {
        $this->email = $email;
    }
    private function setMsg($msg) {
        $this->msg = $msg;
    }
    private function setGtoken($gtoken) {
        $this->gtoken = $gtoken;
    }

    private function setNomOk($nomOk) {
        $this->nomOk = $nomOk;
    }
    private function setPrenomOk($prenomOk) {
        $this->prenomOk = $prenomOk;
    }
    private function setEmailOk($emailOk) {
        $this->emailOk = $emailOk;
    }
    private function setMsgOk($msgOk) {
        $this->msgOk = $msgOk;
    }
    private function setGtokenOk($gtokenOk) {
        $this->gtokenOk = $gtokenOk;
    }
    

    public function getNom() {
        if($this->nom == '') {
            echo json_encode('error');
        } else {
            $regex  = "#^[a-zéèçêâôîà-]{3,20}$#i";
            $result = preg_match($regex, $this->nom);
            if($result) {
                echo json_encode($this->nom, JSON_UNESCAPED_UNICODE);
                $this->setNomOk(1);
                return $this->nom;
            } else {
                echo json_encode('error');
            }
        }
    }
    public function getPrenom() {
        if($this->prenom == '') {
            echo json_encode('error');
        } else {
            $regex  = "#^[a-zéèçêâôîà-]{3,20}$#i";
            $result = preg_match($regex, $this->prenom);
            if($result) {
                echo json_encode($this->prenom, JSON_UNESCAPED_UNICODE);
                $this->setPrenomOk(1);
                return $this->prenom;
            } else {
                echo json_encode('error');
            }
        }
    }
    public function getEmail() {
        if($this->email == '') {
            echo json_encode('error');
        } else {
            $regex  = "#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$#";
            $result = preg_match($regex, $this->email);
            if($result) {
                echo json_encode($this->email);
                $this->setEmailOk(1);
                return $this->email;
            } else {
                echo json_encode('error');
            }
        }
    }
    public function getMsg() {
        if($this->msg == '') {
            echo json_encode('error');
        } else {
            echo json_encode($this->msg);
            $this->setMsgOk(1);
            return $this->msg;
        }
    }
    public function getGtoken() {
        if($this->gtoken == '') {
            echo json_encode('error');
        } else {
            $secret        = '6LdGjo8aAAAAADkPAJYyvPUWpxGB-BxbeLNH8f5v';
            $response      = $this->gtoken;
            $remoteip      = $_SERVER['REMOTE_ADDR'];
            $url           = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response.'&remoteip='.$remoteip;
            $req           = file_get_contents($url);
            $reponseGoogle = json_decode($req);
            if($reponseGoogle->success) {
                $this->setGtokenOk(1);
            } else {
                echo json_encode('error');
            }
        }
    }

    public function getNomOk() {
        return $this->nomOk;
    }
    public function getPrenomOk() {
        return $this->prenomOk;
    }
    public function getEmailOk() {
        return $this->emailOk;
    }
    public function getMsgOk() {
        return $this->msgOk;
    }
    public function getGtokenOk() {
        return $this->gtokenOk;
    }

    public function EnvoiMail() {
        if( ($this->getNomOk() == 1) && ($this->getPrenomOk() == 1) && ($this->getEmailOk() == 1) && ($this->getMsgOk() == 1) && ($this->getGtokenOk() == 1) ) {
            $nom    = $this->nom;
            $prenom = $this->prenom;
            $email  = $this->email;
            $msg    = $this->msg;
            $date   = date('d/m/Y');
            $heure  = date('H:i:s');
            $ip     = $_SERVER['REMOTE_ADDR'];
    
            $destinataire = 'carl.22.tuto@gmail.com';
            $expediteur   = 'mail@carlbrison.fr';
            $sujet        = 'Message en provenance de MonSite.com';
            $contenu      = '
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Contact</title>
                <style>
                    header {
                        background-color: rgb(231,119,15);
                        width: 75%;
                        padding: 5px;
                        box-sizing: border-box;
                        text-align:center;
                        border-radius: 20px;
                        font-family: sans-serif;
                    }
                    h3 {
                        color: #6e1005;
                        font-size: 23px;
                    }
                    h4 {
                        color: #fff;
                        font-size: 18px;
                    }
                    section {
                        font-family: sans-serif;
                        width: 75%;
                        padding: 5px;
                        box-sizing: border-box;
                        border-bottom: 1px dashed #ddd;
                        margin-bottom: 10px;
                        font-size: 15px;
                    }
                </style>
            </head>
            <body>
                <header>
                    <h3>MonSite.com</h3>
                    <h4>Un nouveau message du '.$date.' à '.$heure.'</h4>
                </header>
                <section>
                    <p><strong>Vous avez reçu un nouveau message :</strong></p>
                    <p>'.$msg.'</p>
                </section>
                <section>
                    <p><strong>Nom :</strong> '.strtoupper($nom).'</p>
                    <p><strong>Prénom :</strong> '.ucfirst(strtolower($prenom)).'</p>
                    <p><strong>Email :</strong> '.strtolower($email).'</p>
                    <p><strong>IP :</strong> '.$ip.'</p>
                </section>
            </body>
            </html>
            ';
            $header       = "FROM: $expediteur \n";
            $header      .= "Content-Type:text/html; charset='utf-8'";
            mail($destinataire, $sujet, $contenu, $header);

            /******** Envoi mail client */

            $contenu2 = '
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Contact</title>
                <style>
                    header {
                        background-color: rgb(231,119,15);
                        width: 75%;
                        padding: 5px;
                        box-sizing: border-box;
                        text-align:center;
                        border-radius: 20px;
                        font-family: sans-serif;
                    }
                    h3 {
                        color: #6e1005;
                        font-size: 23px;
                    }
                    h4 {
                        color: #fff;
                        font-size: 18px;
                    }
                    section {
                        font-family: sans-serif;
                        width: 75%;
                        padding: 5px;
                        box-sizing: border-box;
                        border-bottom: 1px dashed #ddd;
                        margin-bottom: 10px;
                        font-size: 15px;
                    }
                </style>
            </head>
            <body>
                <header>
                    <h3>MonSite.com</h3>
                    <h4>Bonjour, merci pour votre message</h4>
                </header>
                <section>
                    <p>Votre demande sera traitée dans les 24 heures ouvrées.</p>
                </section>
            </body>
            </html>
            ';

            mail($email, $sujet, $contenu2, $header);
        }
    }
}