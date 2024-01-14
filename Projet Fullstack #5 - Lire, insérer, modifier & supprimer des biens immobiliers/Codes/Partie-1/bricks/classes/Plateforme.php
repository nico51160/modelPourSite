<?php
class Plateforme {
    private $plateformeID;
    private $plateforme;
    private $url;

    public function getPlateformeID() {
        return $this->plateformeID;
    }
    public function getPlateforme() {
        return $this->plateforme;
    }
    public function getUrl() {
        return $this->url;
    }

    public function setPlateformeID($plateformeID) {
        $this->plateformeID = $plateformeID;
    }
    public function setPlateforme($plateforme) {
        $this->plateforme = $plateforme;
    }
    public function setUrl($url) {
        $this->url = $url;
    }
}