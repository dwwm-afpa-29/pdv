<?php

class FeaturesService{
    private $featuresDao;
    private $FeaturesTypeDao;

    public function __construct(){
        $this->featuresDao = new FeaturesDao;
        $this->FeaturesTypeDao = new FeaturesTypeDao;
    }

    /**
     * récupération d'un tableau réunissant tous les objet features d'un type de produits donné
     * @param ID du type de produit
     * @return tableau d'objet features
     */
    public function getAllFeaturesByProdType($idProdType){
        $featureTypes = $this->FeaturesTypeDao->findByProdType($idProdType);
        $featuresByProductType = [];
        foreach ($featureTypes as $featureType){
                array_push($featuresByProductType, $this->featuresDao->findFeaturesByFeatureType($featureType->getId()));
            }
        return $featuresByProductType;
    }

    /**
     * récupération d'un tableau réunissant tous les objets featuresType en fonction du type de produits
     * @param ID du type de produit
     * @return tableau d'objet FeaturesType
     */
    public function getFeaturesTypesByProdType($IdtypeFeatures) {
        $featureTypes = $this->FeaturesTypeDao->findByProdType($IdtypeFeatures);
        return $featureTypes;
    }
}

    


?>