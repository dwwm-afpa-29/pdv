<?php

class ProdTypeService{
    private $prodTypeDao;

    public function __construct(){
        $this->prodTypeDao = new ProdTypeDao;
    }

    public function getAllTypeProd(){
        $prodTypes = $this->prodTypeDao->findAll();
        return $prodTypes;
    }
}

?>