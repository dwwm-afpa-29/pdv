<?php

class ArticlesController extends AccueilController{

    // private $prodTypeService;
    // private $featuresService;
    private $articlesService;

    public function __construct(){
        
        // $this->prodTypeService = new ProdTypeService();
        // $this->featuresService = new FeaturesService();
        parent::__construct();
        $this->articlesService = new ArticlesService();
        $this->articlesDao = new ArticlesDao();
        
        
    }


    public function afficheAccueil(){
        require_once BACK_ROOT  . '/views/accueil.php';
        parent::index();
    }

///////////////////   Fonctions pour les formulaires d'enregistrement de produit



//temporaire: Pour afficher tous les aticles
    public function getAllArticles(){
        $this->articlesDao->findAll();
    }


/**
 * Affichage un menu déroulant avec les grands types de produits: première étape du formulaire d'enregistrement d'un nouvel article
 * @return void
 */
    public function newArticle($message): void {
        ob_start();
        $allProdType = $this->prodTypeService->getAllTypeProd();

        require_once BACK_ROOT  . '/views/formArticle.php';
        // $view = ob_get_clean();
        parent::index();
        // require_once(BACK_ROOT . '/views/template.php');
    }

/**
 * Affiche les différents champs à remplir pour un nouvel article avec les caractéristiques (menu déroulants)
 * correspondantes au type de produit sélectionné
 * @return void
 */
    public function loadFeatures(): void{
        ob_start();
        $dataProdtype= explode(";",$_POST['type']);
        $idProdType = $dataProdtype[0];
        $wordingProdType = $dataProdtype[1];
        $allProdType = $this->prodTypeService->getAllTypeProd();
        $featuresByProductType = $this->featuresService->getAllFeaturesByProdType($idProdType);
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($idProdType);
        require_once BACK_ROOT  . '/views/formArticle.php';
        parent::index();
    }

    /**
     * création d'un objet article + enregistrement en base de donnée
     * @return void
     */
    public function addNewArticle(): void {
        $newArticleEntity = $this->articlesService->create($_POST);
        $message = $this->articlesService->recordNewArticle($newArticleEntity,$_FILES);
        $this->newArticle($message);
    }

    public function newCaract(){
        ob_start();
        $allProdType = $this->prodTypeService->getAllTypeProd();

        require_once BACK_ROOT  . '/views/formCaract.php';
        parent::index();
    }

    public function loadTypeFeatures(){
        ob_start();
        $allProdType = $this->prodTypeService->getAllTypeProd();

        $dataProdtype= explode(";",$_POST['type']);
        $idProdType = $dataProdtype[0];
        $wordingProdType = $dataProdtype[1];
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($idProdType);
        require_once BACK_ROOT  . '/views/formCaract.php';
        parent::index();
    }

    public function addNewFeature() {
        ob_start();
        $featureEntity = $this->featuresService->create($_POST);
        $this->featuresService->recordNewFeature($featureEntity);

        parent::index();
    }

    
    public function newCaractInArticleForm($_idFeatureType){
        $featureType = $this->featuresService->getFeaturesTypesById($_idFeatureType);
        require_once BACK_ROOT  . '/views/formCaractInFormArticle.php';
    }

    
    public function addNewFeatureInArticleForm($data){
        ob_start();
        $featureEntity = $this->featuresService->create($data);
        $this->featuresService->recordNewFeature($featureEntity);
    }


    ///////////////////////   Affichage des produits

    public function viewProducts($data) {
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($data[0]);
        $this->featuresService->cleanUnderscoreFeatureType($featureTypes);

        if(isset($data[2])){
            $articles = $this->articlesService->getArticleByFeaturesId($data);
        } else {
            $articles = $this->articlesService->getArticleByProdTypeId($data[0]);
        }


        ob_start();
        require_once(BACK_ROOT . '/views/viewProducts.php');
        parent::index();
    }

}


?>