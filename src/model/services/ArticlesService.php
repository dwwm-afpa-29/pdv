<?php

class ArticlesService { 
    private $articleDao;
    private $featuresDao;

    public function __construct(){
        $this->articleDao = new ArticlesDao();
        $this->featuresDao = new FeaturesDao();
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
                        ->setPhoto($_data['photo'])
                        ->setProdType($_data['type']);

        // Ajout de toutes les caractéristiques (features) à l'objet nouvellement créé.
        foreach ($_data as $key => $element){
            if($key != 'name' && $key != 'price' && $key != 'photo' && $key != 'type' && $key != 'degre') {
                if ($key == 'cepage') {
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
        $this->articleDao->recordArticle($newArticleEntity);
    }

}
?>