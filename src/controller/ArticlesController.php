<?php

class ArticlesController{

    private $featuresTypeService;
    private $prodTypeService;
    private $featuresService;
    private $articlesService;

    public function __construct(){
        
        $this->prodTypeService = new ProdTypeService();
        $this->featuresTypeService = new FeaturesTypeService();
        $this->featuresService = new FeaturesService();
        $this->articlesService = new ArticlesService();

        $this->articlesDao = new ArticlesDao();
        
        
    }

    public function getAllArticles(){
        $this->articlesDao->findAll();
    }

    public function newArticle(){
        $allProdType = $this->prodTypeService->getAllTypeProd();

        ob_start();
        require_once BACK_ROOT  . '/views/formArticle.php';
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
    }

    public function loadFeatures(){
        

        ob_start();
        $idProdType = $_POST['type'];
        $allProdType = $this->prodTypeService->getAllTypeProd();
        $featuresByProductType = $this->featuresService->getAllFeaturesByProdType($idProdType);
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($idProdType);
        
        require_once BACK_ROOT  . '/views/formArticle.php';
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
    }

    public function addNewArticle() {
        $newArticleEntity = $this->articlesService->create($_POST);
        $this->articlesService->recordNewArticle($newArticleEntity);
    }
}

// Commentaire test Git

?>