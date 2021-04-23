<?php

class ArticlesController extends AccueilController{

    // private $prodTypeService;
    // private $featuresService;
    private $articlesService;

    public function __construct(){
        ob_start();
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
        $id="";   // Ici c'est un nouvel article, donc l'id n'existe pas encore mais il faut créé la variable vide pou pouvoir utiliser la fonction create()
        $newArticleEntity = $this->articlesService->create($_POST,$id);
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

    
    public function newCaractInArticleForm($data){
        $featureType = $this->featuresService->getFeaturesTypesById($data['idFeatureType']);
        require_once BACK_ROOT  . '/views/formCaractInFormArticle.php';
    }

    
    public function addNewFeatureInArticleForm($data){
        ob_start();
        $featureEntity = $this->featuresService->create($data);
        $this->featuresService->recordNewFeature($featureEntity);
    }


    ///////////////////////   Affichage des produits

    public function viewProducts($data) {
        ob_start();
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($data[0]);
        $this->featuresService->cleanUnderscoreFeatureType($featureTypes);

        if(isset($data[2])){
            $articles = $this->articlesService->getArticleByFeaturesId($data);
        } else {
            $articles = $this->articlesService->getArticleByProdTypeId($data[0]);
        }

        require_once(BACK_ROOT . '/views/viewProducts.php');
        parent::index();
    }

    public function viewProductsMobile() {
        ob_start();
        $allProdTypes = $this->prodTypeService->getAllTypeProd();
        require_once(BACK_ROOT . '/views/viewProductsMobile.php');
        parent::index();
    }
    
    public function stockManagement($message){
        ob_start();
        $allArticles = $this->articlesService->getAllArticles();
        require_once(BACK_ROOT . '/views/ViewStockManagement.php');
        parent::index();
    }

    public function modificationArticle($_data){
        ob_start();
        $allArticles = $this->articlesService->getAllArticles();
        require_once(BACK_ROOT . '/views/ViewStockManagement.php');
        $idOfArticleToModify = $_data[0];
        $articleToModify = $this->articlesService->getArticleById($idOfArticleToModify);
        
        $allProdType = $this->prodTypeService->getAllTypeProd();
        $featuresByProductType = $this->featuresService->getAllFeaturesByProdType($articleToModify->getProdType()->getId());
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($articleToModify->getProdType()->getId());
        require_once(BACK_ROOT  . '/views/viewModifArticle.php');
        parent::index();
    }

    public function updateArticle($id){
        $idArticle = $id[0];
        $entityArticleToUpdate = $this->articlesService->create($_POST,$idArticle);
        $message = $this->articlesService->newUpdateArticle($entityArticleToUpdate);
        $this->stockManagement($message);
    }

    public function viewFeaturesMobile($data) {
        ob_start();
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($data[0]);
        $this->featuresService->cleanUnderscoreFeatureType($featureTypes);
        $features = $this->featuresService->getAllFeature();

        require_once(BACK_ROOT . '/views/viewFeaturesMobile.php');
        parent::index();
    }

}


?>