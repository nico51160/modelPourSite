<?php
class Bien {
    private $bienID;
    private $bien;
    private $image;
    private $plateformeID;

    public function getBienID() {
        return $this->bienID;
    }
    public function getBien() {
        return $this->bien;
    }
    public function getImage() {
        return $this->image;
    }
    public function getPlateformeID() {
        return $this->plateformeID;
    }

    public function setBienID($bienID) {
        $this->bienID = $bienID;
    }
    public function setBien($bien) {
        $this->bien = $bien;
    }
    public function setImage($image) {
        $this->image = $image;
    }
    public function setPlateformeID($plateformeID) {
        $this->plateformeID = $plateformeID;
    }
}