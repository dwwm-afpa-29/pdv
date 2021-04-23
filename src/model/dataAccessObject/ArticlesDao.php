<?php

class ArticlesDao extends BaseDao{

    public function findAll() {
        $stmt = $this->db->prepare("SELECT id, name, degre, price, photo, id_type_products as prodType, stock, visible FROM `articles`");
        $res = $stmt->execute();
        if($res){
           $product = $stmt->fetchAll(\PDO::FETCH_CLASS, Articles::class);
           return $product;
        }
    }

    public function findById($_idArticle){
        $stmt = $this->db->prepare("SELECT id, name, degre, price, photo, id_type_products as prodType, stock, visible FROM articles WHERE id = ".$_idArticle);
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchObject(Articles::class);
        }
    }

/**
 * Enregistre en base de donnée l'objet article rentré via le formulaire: envoie dans la table articles puis, envois successifs
 * des caractéristique dans la table relationnelle articles_vs_features
 * @return 
 */
    public function recordArticle($_articleEntity){
        // Préparation des requêtes sql (à faire avant de début la transaction)
        $stmtArticles = $this->db->prepare("INSERT INTO `articles` (`id`,`name`, `degre` , `price`, `photo`, `id_type_products` , `visible` , `stock`) VALUES (NULL, :nameProd, :degre , :price , :photo, :id_type_products, :visible, :stock)");

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
                    ':visible'=>$_articleEntity->getVisible(),
                    ':stock'=>$_articleEntity->getStock(),
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
            $sizePicture = filesize($_FILES['photo']['tmp_name']);
            $extensionPicture= strrchr($_FILES['photo']['name'],'.');
            $extensionsOK = array('.png', '.jpg', '.jpeg', '.JPG');
            if (!in_array($extensionPicture,$extensionsOK)) {
                $this->db->rollback();
                $message = "<p style= 'color: red'>le fichier à uploader doit être de type png, jpg ou jpeg </p><br>";
                return $message;
            } else {
                if ($sizePicture>2000000){
                    $this->db->rollback();
                    $message = "<p style= 'color: red'>le fichier photo est trop lourd </p><br>";
                    return $message;
                } else {
                    $newPictureName = 'img_'.$idNewArticle.'.jpg';
                    $uploadfile = ROOT  . '/public/assets/image/photo_articles/'.$newPictureName;
                    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
    
                    $stmtPhoto->execute(
                        [
                            ':id'=>$idNewArticle,
                            ':pictureName'=>$newPictureName,
                        ]);
                }
            }

            // Commit: Si une des requêtes qui se trouve dans la transaction échou, le commit ne se fait pas.
            $this->db->commit();
            $message = "<p style= 'color: green'>le nouvel article à été enregistré avec succès</p><br>";
            return $message;
            


// En cas d'erreur sur l'une des requêtes effectuées dans le try, on lance les fonction suivantes
        } catch(PDOException $err) {
            // rollback: les insertions déjà effectuées sont annulées 
            $this->db->rollback();
            print "ERROR! : ".$err->getMessage()."</br>";
        }
        
    }

    public function findArticleIdByProdTypeId($IdProdType) {
        $stmt = $this->db->prepare("SELECT	id FROM articles WHERE 	id_type_products = ".$IdProdType );
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}



?>