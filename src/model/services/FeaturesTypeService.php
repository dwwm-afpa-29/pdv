<?php

class FeaturesTypeService{
    private $FeaturesTypeDao;

    public function __construct(){
        $this->FeaturesTypeDao = new FeaturesTypeDao;
    }

    public function getFeaturesTypeByProdType($typeData){
        $featuresTypes = $this->FeaturesTypeDao->findByType($typeData);
        return $featuresTypes;
    }
}
