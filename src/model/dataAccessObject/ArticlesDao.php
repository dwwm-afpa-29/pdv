<?php

class ArticlesDao extends BaseDao{
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM articles");
        $res = $stmt->execute();
        if($res){
            print_r($stmt->fetch(PDO::FETCH_ASSOC));
        }
    }
/**
 * Enregistre en base de donnée l'objet article rentré via le formulaire: envoie dans la table articles puis, envois successifs
 * des caractéristique dans la table relationnelle articles_vs_features
 * @return 
 */
    public function recordArticle($_articleEntity){
        // Préparation des requêtes sql (à faire avant de début la transaction)
        $stmtArticles = $this->db->prepare("INSERT INTO `articles` (`id`,`name`, `degre` , `price`, `photo`, `id_type_products`) VALUES (NULL, :nameProd, :degre , :price , :photo, :id_type_products)");

        $stmtPhoto = $this->db->prepare("UPDATE articles SET articles.photo = :pictureName WHERE articles.id = :id");

        $stmtFeaturesVsArticles = $this->db->prepare("INSERT INTO `articles_vs_features` (`id`, `id_articles`) VALUES (:id, :id_articles)");
        try {
            // Début de la transation
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
            // Si l'articles à des caractéristiques, elles seront envoyée une par une dans la table articles_vs_features
            if ($features){
                foreach($_articleEntity->getFeatures() as $feature){
                    
                    $stmtFeaturesVsArticles->execute(
                        [
                            ':id'=>$feature->getId(),
                            ':id_articles'=>$idNewArticle,
                        ]);
                }
            }

            // upload de la photo et changement de nom
            $newPictureName = 'img_'.$idNewArticle.'.jpg';
            $uploadfile = ROOT  . '/public/assets/image/photo_articles/'.$newPictureName;
            move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);

            $stmtPhoto->execute(
                [
                    ':id'=>$idNewArticle,
                    ':pictureName'=>$newPictureName,
                ]);

            // Commit: Si une des requêtes qui se trouve dans la transaction échou, le commit ne se fait pas.
            $this->db->commit();
// En cas d'erreur sur l'une des requêtes effectuées dans le try, on lance les fonction suivantes
        } catch(PDOException $err) {
            // rollback: les insertions déjà effectuées sont annulées 
            $this->db->rollback();
            print "ERROR! : ".$err->getMessage()."</br>";
        }
        
    }

}



?>