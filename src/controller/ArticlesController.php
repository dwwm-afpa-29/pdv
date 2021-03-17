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

    public function loadFeatures(/* $_data */){
        
        /***************/
        $_data = $_POST;
        /***************/

        ob_start();
        $idProdType = $_data['type'];
        $allProdType = $this->prodTypeService->getAllTypeProd();
        $featuresByProductType = $this->featuresService->getAllFeaturesByProdType($idProdType);
        $featureTypes = $this->featuresService->getFeaturesTypesByProdType($idProdType);
        
        require_once BACK_ROOT  . '/views/formArticle.php';
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
    }

    public function addNewArticle(/* $_data */) {

                /***************/
                $_data = $_POST;
                /***************/
        $newArticleEntity = $this->articlesService->create($_data);
        $this->articlesService->recordNewArticle($newArticleEntity);
    }
}

?>