<?php
class Valider {
    private $nom;
    private $prenom;
    private $email;
    private $msg;

    private $nomOk;
    private $prenomOk;
    private $emailOk;
    private $msgOk;


    public function __construct($nom, $prenom, $email, $msg) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->setMsg($msg);
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

    public function getNom() {
        if($this->nom == '') {
            echo json_encode('error');
        } else {
            $regex  = "#^[a-zéèçêâôî-]{3,20}$#i";
            $result = preg_match($regex, $this->nom);
            if($result) {
                echo json_encode($this->nom);
                $this->nomOk = 1;
            } else {
                echo json_encode('error');
            }
        }
    }
    public function getPrenom() {
        if($this->prenom == '') {
            echo json_encode('error');
        } else {
            $regex  = "#^[a-zéèçêâôî-]{3,20}$#i";
            $result = preg_match($regex, $this->prenom);
            if($result) {
                echo json_encode($this->prenom);
                $this->prenomOk = 1;
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
                $this->emailOk = 1;
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
            $this->msgOk = 1;
        }
    }

    public function EnvoiMail() {
        if( ($this->nomOk == 1) && ($this->prenomOk == 1) && ($this->emailOk == 1) && ($this->msgOk == 1) ) {
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