<?php

class AccueilController {

    protected $prodTypeService;
    protected $featuresService;

    public function __construct(){
        $this->prodTypeService = new ProdTypeService();
        $this->featuresService = new FeaturesService();
    }

    public function index(){

        $allProdTypes = $this->prodTypeService->getAllTypeProd();
        $allFeatureTypes = $this->featuresService->getAllFeatureTypes();
        $this->featuresService->cleanUnderscoreFeatureType($allFeatureTypes);
        $allFeatures = $this->featuresService->getAllFeature();


        foreach($allFeatureTypes as $featureType){
            ${'features_'.$featureType->getId()} = $this->featuresService->getAllFeaturesByFeatureType($featureType->getId());
        }

        
        // ob_start();
        require_once BACK_ROOT  . '/views/accueil.php';
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
    }
}
?>