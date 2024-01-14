<?php
class Bien extends Plateforme {
    private $bienID;
    private $bien;
    private $image;

    public function getBienID() {
        return $this->bienID;
    }
    public function getBien() {
        return $this->bien;
    }
    public function getImage() {
        return $this->image;
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
}