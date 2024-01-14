<?php
class Commande {
    protected $ref;
    private $date;

    public function getRef() {
        return $this->ref;
    }
    public function getDate() {
        return $this->date;
    }

    public function setRef($ref) {
        $this->ref = $ref;
    }
    public function setDate($date) {
        $this->date = $date;
    }
}