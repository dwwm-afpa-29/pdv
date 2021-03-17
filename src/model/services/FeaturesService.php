<?php

class FeaturesService{
    private $featuresDao;
    private $FeaturesTypeDao;

    public function __construct(){
        $this->featuresDao = new FeaturesDao;
        $this->FeaturesTypeDao = new FeaturesTypeDao;
    }

    //récupération d'un tableau d'objet features en fonction du type de produits
    public function getAllFeaturesByProdType($idProdType){
        $featureTypes = $this->FeaturesTypeDao->findByProdType($idProdType);
        $featuresByProductType = [];
        foreach ($featureTypes as $featureType){
                array_push($featuresByProductType, $this->featuresDao->findFeaturesByFeatureType($featureType->getId()));
            }
        return $featuresByProductType;
    }

    //récupération d'un tableau d'objet featuresType en fonction du type de produits
    public function getFeaturesTypesByProdType($IdtypeFeatures) {
        $featureTypes = $this->FeaturesTypeDao->findByProdType($IdtypeFeatures);
        return $featureTypes;
    }
}

    


?>