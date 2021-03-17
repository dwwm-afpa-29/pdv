<?php

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