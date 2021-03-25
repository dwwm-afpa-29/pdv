<?php

// Features rerésentent toutes les caractéristiques
class Features {
    private $id;
    private $wording;
    private $idTypeFeatures;

    public function getId() {
        return $this->id;
    }
    public function setId($_id) {
        $this->id = $_id;
        return $this;
    }

    public function getWording() {
        return $this->wording;
    }

    public function setWording($_wording) {
        $this->wording = $_wording;
        return $this;
    }

    public function getIdTypeFeatures() {
        return $this->idTypeFeatures;
    }

    public function setIdTypeFeatures($_idTypeFeatures) {
        $this->idTypeFeatures = $_idTypeFeatures;
        return $this;
    }
}


?>