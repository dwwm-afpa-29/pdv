<?php

/**
 * Obtenir toutes les features faisant partie d'un type de features
 * @param ID de type de features
 * @return tableau d'objet de la classe Features
 */
class FeaturesDao extends BaseDao {
    public function findFeaturesByFeatureType($IdtypeFeatures) {
        $stmt = $this->db->prepare("SELECT id,wording,id_type_features as typeFeatures FROM features WHERE id_type_features = ".$IdtypeFeatures );
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Features::class);
        }
    }

/**
 * Obtenir un feature en fonction d'un id
 * @param ID de features
 * @return objets de la classe Features
 */
    public function findFeaturesByID($id) {
        $stmt = $this->db->query("SELECT id,wording,id_type_features as typeFeatures FROM features WHERE id= ".$id );
        return $stmt->fetchObject(Features::class);
    }

    public function recordFeature($newFeatureEntity) {
        // Recherche de la caractéristique entrée dans le formulaire pour éviter les doublons dans la bdd.
        // Dans la requête, tout est transformé en majuscule ( UPPER() ) pour éviter les problème casse.
        $stmt = $this->db->prepare('SELECT * FROM features WHERE UPPER(wording) = UPPER("'.$newFeatureEntity->getWording().'")  AND id_type_features = '.$newFeatureEntity->getIdTypeFeatures());
        $res = $stmt->execute();
        $test = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($test){
            print_r("la donné existe déjà");
        } else {
            $stmtFeature = $this->db->prepare("INSERT INTO features (features.id, features.wording , features.id_type_features) VALUES (NULL, :wording, :id_type_features)");
            $stmtFeature->execute(
                [
                    ':wording' => $newFeatureEntity->getWording(),
                    ':id_type_features' => $newFeatureEntity->getTypeFeatures(),
                ]
                );
            print_r("la nouvelle caractéristique a bien été enregitrée");
        }
    }

    public function findAll() {
        $stmt = $this->db->prepare("SELECT id,wording,id_type_features as typeFeatures FROM features");
        $res = $stmt->execute();
        if($res){
            $features = $stmt->fetchAll(\PDO::FETCH_CLASS, Features::class);
            return $features;
        }
    }

    public function findArticleIdByFeaturesId($IdFeatures) {
        $stmt = $this->db->prepare("SELECT 	id_articles FROM articles_vs_features WHERE id = ".$IdFeatures );
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function findFeaturesIdByArticleId($IdArticle) {
        $stmt = $this->db->prepare("SELECT	id FROM articles_vs_features WHERE 	id_articles = ".$IdArticle );
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}

?>