<?php

class ArticlesDao extends BaseDao{
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM articles");
        $res = $stmt->execute();
        if($res){
            print_r($stmt->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function createArticleFromField($_data) {
        $newArticle = new Articles();
        $newArticle->setName($_data['name'])
                    ->setDegre($_data['degre'])
                    ->setPrice($_data['price'])
                    ->setPhoto($_data['photo'])
                    ->setProdType($_data['type']);
        return $newArticle;
    }


    public function recordArticle($_articleEntity){
        
        $stmtArticles = $this->db->prepare("INSERT INTO `articles` (`id`,`name`, `degre` , `price`, `photo`, `id_type_products`) VALUES (NULL, :nameProd, :degre , :price , :photo, :id_type_products)");

        $stmtFeaturesVsArticles = $this->db->prepare("INSERT INTO `articles_vs_features` (`id`, `id_articles`) VALUES (:id, :id_articles)");
        try {
            $this->db->beginTransaction();

            $stmtArticles->execute(
                [
                    ':nameProd'=>$_articleEntity->getName(),
                    ':degre'=>$_articleEntity->getDegre(),
                    ':price'=>$_articleEntity->getPrice(),
                    ':photo'=>$_articleEntity->getPhoto(),
                    ':id_type_products'=>$_articleEntity->getProdType(),
                ]);
            $idNewArticle = $this->db->lastInsertId();
            $features = $_articleEntity->getFeatures();
            if ($features){
                foreach($_articleEntity->getFeatures() as $feature){
                    
                    $stmtFeaturesVsArticles->execute(
                        [
                            ':id'=>$feature->getId(),
                            ':id_articles'=>$idNewArticle,
                        ]);
                }
            }
            $this->db->commit();

        } catch(PDOException $err) {
            $this->db->rollback();
            print "ERROR! : ".$err->getMessage()."</br>";
        }
        
    }

}
// VOIR les transactions en SQL pour modifier plusieurs tables à la fois et faire un commit seulement une fois que tout est fait.

// site à voir

//   https://www.php.net/manual/fr/pdo.lastinsertid.php
//   https://www.php.net/manual/fr/pdo.begintransaction.php
//   https://www.php.net/manual/fr/pdo.transactions.php


?>