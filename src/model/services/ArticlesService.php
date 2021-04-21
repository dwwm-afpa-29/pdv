<?php

class ArticlesService { 
    private $articleDao;
    private $featuresDao;
    private $prodTypeDao;
    private $featuresTypeDao;

    public function __construct(){
        $this->articleDao = new ArticlesDao();
        $this->featuresDao = new FeaturesDao();
        $this->prodTypeDao = new ProdTypeDao();
        $this->featuresTypeDao =new FeaturesTypeDao();
    }

/**
 * Création d'un objet de classe Article
 * @param Tableau associatif issu du POST du formulaire de nouvel article.
 * @return objet de la classe Article
 */
    public function create($_data) {

        // Début de création avec les attribut de base de l'objet
            $newArticle = new Articles();
            $newArticle->setName($_data['name'])
                        ->setDegre($_data['degre'])
                        ->setPrice($_data['price'])
                        ->setProdType($_data['type']);

        // Ajout de toutes les caractéristiques (features) à l'objet nouvellement créé.
        foreach ($_data as $key => $element){
            if($key != 'name' && $key != 'price' && $key != 'photo' && $key != 'type' && $key != 'degre') {
                if ($key == 'Cépages') {
                    foreach ($element as $arrayElmt){
                        $newArticleFeature = $this->featuresDao->findFeaturesByID($arrayElmt);
                        $newArticle->addFeatures($newArticleFeature);
                    }
                } else {
                    $newArticleFeature = $this->featuresDao->findFeaturesByID($element);
                    $newArticle->addFeatures($newArticleFeature);
                }
            }
        }
        return $newArticle;
    }


    /**
     * Enregistrement en BDD d'un objet de classe article
     * @param Objet de la classe Article
     * @return void
     */
    public function recordNewArticle($newArticleEntity){
        $message = $this->articleDao->recordArticle($newArticleEntity,$_FILES);
        return $message;
    }

    /**
     * Selection des articles en fonction de l'id du type de caractéristique
     * @param Id featuresType
     * @return tableau d'objet de type articles
     */

    public function getArticleByFeaturesId($data){
        $articleIds = $this->featuresDao->findArticleIdByFeaturesId($data[2]);
        $articles = [];
        foreach($articleIds as $article){
            $newArticleEntity = $this->articleDao->findById($article['id_articles']);
            $featuresOfArticle = $this->featuresDao->findFeaturesIdByArticleId($article['id_articles']);
            foreach($featuresOfArticle as $feature){
                $featureToAdd = $this->featuresDao->findFeaturesByID($feature['id']);
                $newArticleEntity->addFeatures($featureToAdd);
            };
            array_push($articles,$newArticleEntity);
        }
        return $articles;
    }

    public function getArticleByProdTypeId($data){
        $articleIds = $this->articleDao->findArticleIdByProdTypeId($data[0]);
        $articles = [];
        foreach($articleIds as $article){
            $newArticleEntity = $this->articleDao->findById($article['id']);
            $featuresOfArticle = $this->featuresDao->findFeaturesIdByArticleId($article['id']);
            foreach($featuresOfArticle as $feature){
                $featureToAdd = $this->featuresDao->findFeaturesByID($feature['id']);
                $newArticleEntity->addFeatures($featureToAdd);
            };
            array_push($articles,$newArticleEntity);
        }
        return $articles;
    }

    public function getAllArticles(){
        $articles = $this->articleDao->findAll();
        foreach($articles as $unArticle){
            $featureIdsOfArticle = $this->featuresDao->findFeaturesIdByArticleId($unArticle->getId());
            foreach($featureIdsOfArticle as $feature){
                $featureToAdd = $this->featuresDao->findFeaturesByID($feature['id']);
                $featureTypeToAdd = $this->featuresTypeDao->findById($featureToAdd->getTypeFeatures());
                $featureToAdd->setTypeFeatures($featureTypeToAdd);
                $unArticle->addFeatures($featureToAdd);
            };
            $prodTypeOfArticle = $this->prodTypeDao->findById($unArticle->getProdType());
            $unArticle->setProdType($prodTypeOfArticle);
        }
        return $articles;
    }

}
?>