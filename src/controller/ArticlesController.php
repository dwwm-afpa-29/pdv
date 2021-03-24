<?php

class ArticlesController{

    private $prodTypeService;
    private $featuresService;
    private $articlesService;

    public function __construct(){
        
        $this->prodTypeService = new ProdTypeService();
        $this->featuresService = new FeaturesService();
        $this->articlesService = new ArticlesService();
        $this->articlesDao = new ArticlesDao();
        
        
    }
//temporaire: Pour afficher tous les aticles
    public function getAllArticles(){
        $this->articlesDao->findAll();
    }


/**
 * Affichage un menu déroulant avec les grands types de produits: première étape du formulaire d'enregistrement d'un nouvel article
 * @return void
 */
    public function newArticle(): void {
        $allProdType = $this->prodTypeService->getAllTypeProd();

        ob_start();
        require_once BACK_ROOT  . '/views/formArticle.php';
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
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
        $view = ob_get_clean();
        require_once(BACK_ROOT . '/views/template.php');
    }

    /**
     * création d'un objet article + enregistrement en base de donnée
     * @return void
     */
    public function addNewArticle(): void {
        $newArticleEntity = $this->articlesService->create($_POST);
        $this->articlesService->recordNewArticle($newArticleEntity);
    }
}


?>