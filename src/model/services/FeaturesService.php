<?php

class FeaturesService{
    private $featuresDao;
    private $featuresTypeDao;

    public function __construct(){
        $this->featuresDao = new FeaturesDao;
        $this->featuresTypeDao = new FeaturesTypeDao;
    }

    /**
     * récupération d'un tableau réunissant tous les objet features d'un type de produits donné
     * @param ID du type de produit
     * @return tableau d'objet features
     */
    public function getAllFeaturesByProdType($idProdType){
        $featureTypes = $this->featuresTypeDao->findByProdType($idProdType);
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
        $featureTypes = $this->featuresTypeDao->findByProdType($IdtypeFeatures);
        return $featureTypes;
    }

    public function getFeaturesTypesById($_IdtypeFeature) {
        $featureType = $this->featuresTypeDao->findById($_IdtypeFeature);
        return $featureType;
    }

    public function create($_data){
        $newFeature = new Features();
        $newFeature->setWording($_data['newFeature'])
                    ->setIdTypeFeatures($_data['idFeatureType']);
        return $newFeature;
    }

    public function recordNewFeature($newFeatureEntity){
        $this->featuresDao->recordFeature($newFeatureEntity);
    }

    public function getAllFeatureTypes(){
        $allFeatureTypes = $this->featuresTypeDao->findAll();
        return $allFeatureTypes;
    }

    public function getAllFeature(){
        $allFeature = $this->featuresDao->findAll();
        return $allFeature;
    }

    public function getAllFeaturesByFeatureType($IdFeaturesType){
        $featuresByFeaturesType = $this->featuresDao->findFeaturesByFeatureType($IdFeaturesType);
        return $featuresByFeaturesType;
    }

    public function cleanUnderscoreFeatureType($allFeatureTypes){
        foreach ($allFeatureTypes as $featureType){
            $wording = explode("_", $featureType->getWording() )[0];
            $featureType->setWording($wording);
        }
    }
}

    


?>