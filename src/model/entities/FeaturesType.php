<?php

// FeatureType  représente les categorie de caractéristiques (ex: couleur_vin; cépage; appellation...)
class FeaturesType {
    private $id;
    private $wording;
    private $id_type_products;

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

    public function getId_type_products() {
        return $this->id_type_products;
    }

    public function setId_type_products($idTypeProducts) {
        $this->id_type_products = $idTypeProducts;
        return $this;
    }
}


?>