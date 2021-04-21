<?php

// Features rerésentent toutes les caractéristiques
class Features {
    private $id;
    private $wording;
    private $typeFeatures;

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

    public function getTypeFeatures() {
        return $this->typeFeatures;
    }

    public function setTypeFeatures($_typeFeatures) {
        $this->typeFeatures = $_typeFeatures;
        return $this;
    }
}


?>