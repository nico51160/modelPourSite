<?php
class EnvoyerMail {
    private $prenom;
    private $nom;
    private $email;
    private $ref;

    public function __construct($prenom, $nom, $email, $ref) {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setRef($ref);
    }

    private function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    private function setNom($nom) {
        $this->nom = $nom;
    }
    private function setEmail($email) {
        $this->email = $email;
    }
    private function setRef($ref) {
        $this->ref = $ref;
    }

    private function getPrenom() {
        return $this->prenom;
    }
    private function getNom() {
        return $this->nom;
    }
    private function getEmail() {
        return $this->email;
    }
    private function getRef() {
        return $this->ref;
    }

    public function EnvoiMail() {
        $expediteur   = 'A_COMPLETER';
        $ref          = $this->getRef();
        $prenom       = $this->getPrenom();
        $nom          = $this->getNom();
        $destinataire = $this->getEmail();

        $sujet        = 'Nouvel événement concernant votre commande réf.' .$ref;
        $contenu      = '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nouvel événement concernant votre commande</title>
            <style>
                #box {
                    width: 75%;
                    margin: auto;
                    font-family: sans-serif;
                }
                header {
                    background-color: rgb(72,8,247);
                    color: aliceblue;
                    text-align: center;
                    padding-top: 10px;
                    padding-bottom: 10px;
                }
                a {
                    color: blue;
                }
            </style>
        </head>
        <body>
            <div id="box">
                <header>
                    <h2>MonSite.com</h2>
                    <h3>Nouvel événement concernant votre commande réf. '.$ref.'</h3>
                </header>
                <article>
                    <h4>Bonjour '.$prenom.' '.$nom.',</h4>
                    <p>Un nouvel événement concernant votre commande réf. '.$ref.' vient d\'être déclaré.</p>
                    <p><a href="#">CLiquez ici pour voir ce nouvel événement</a></p>
                    <p><em>Nous vous remercions pour votre confiance,<br>MonSite.com</em></p>
                </article>
            </div>
        </body>
        </html>
        ';
        $header       = "FROM:$expediteur \n";
        $header      .= "Content-Type:text/html; charset='utf-8'";

        mail($destinataire, $sujet, $contenu, $header);
    }
}