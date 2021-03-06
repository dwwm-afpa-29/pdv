<?php

/**
 * Récupérer tous les types de caractéristiques associées à un type de produit
 * @param id de type de produit
 * @return tableau d'objet de class FeaturesType
 */
class FeaturesTypeDao extends BaseDao {
    public function findByProdType($typeData) {
        $stmt = $this->db->prepare("SELECT * FROM type_features WHERE id_type_products = ".$typeData);
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_CLASS, FeaturesType::class);
        }
    }
    public function findById($_idFeature){
        $stmt = $this->db->prepare("SELECT * FROM type_features WHERE id = ".$_idFeature);
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchObject(FeaturesType::class);
        }
    }

    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM type_features");
        $res = $stmt->execute();
        if($res){
            $featuresType = $stmt->fetchAll(\PDO::FETCH_CLASS, FeaturesType::class);
            return $featuresType;
        }
    }

}

?>