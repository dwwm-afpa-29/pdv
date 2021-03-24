<?php

class ProdTypeService{
    private $prodTypeDao;

    public function __construct(){
        $this->prodTypeDao = new ProdTypeDao;
    }

/**
 * récupéré tous les types de produits de la bdd
 * @return tableau d'objet de class ProdType
 */
    public function getAllTypeProd(){
        $prodTypes = $this->prodTypeDao->findAll();
        return $prodTypes;
    }
}

?>