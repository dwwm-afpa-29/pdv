<?php

class ArticlesService { 
    private $articleDao;
    private $featuresDao;

    public function __construct(){
        $this->articleDao = new ArticlesDao();
        $this->featuresDao = new FeaturesDao();
    }


    public function create($_data) {

        $newArticle = $this->articleDao->createArticleFromField($_data);

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

    public function recordNewArticle($newArticleEntity){
        $this->articleDao->recordArticle($newArticleEntity);
    }

}
?>