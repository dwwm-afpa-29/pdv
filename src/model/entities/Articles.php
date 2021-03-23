<?php

class Articles {
    private $id;
    private $name;
    private $degre;
    private $price;
    private $photo;
    private $prodType;
    private $features;

    public function getId() {
        return $this->id;
    }
    public function setId($_id) {
        $this->id = $_id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($_name) {
        $this->name = $_name;
        return $this;
    }

    public function getDegre() {
        return $this->degre;
    }
    public function setDegre($_degre) {
        $this->degre = $_degre;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }
    public function setPrice($_price) {
        $this->price = $_price;
        return $this;
    }

    public function getPhoto() {
        return $this->photo;
    }
    public function setPhoto($_photo) {
        $this->photo = $_photo;
        return $this;
    }

    public function getProdType() {
        return $this->prodType;
    }
    public function setProdType($_prodType) {
        $this->prodType = $_prodType;
        return $this;
    }

    public function getFeatures() {
        return $this->features;
    }
    public function addFeatures($_features) {
        $this->features[] = $_features;
        return $this;
    }
}


?>