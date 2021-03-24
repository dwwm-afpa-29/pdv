<?php

// FeatureType  représente les categorie de caractéristiques (ex: couleur_vin; cépage; appellation...)
class FeaturesType {
    private $id;
    private $wording;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getWording() {
        return $this->wording;
    }

    public function setWording($wording) {
        $this->wording = $wording;
        return $this;
    }
}


?>