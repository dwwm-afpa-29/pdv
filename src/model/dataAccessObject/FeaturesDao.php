<?php

/**
 * Obtenir toutes les features faisant partie d'un type de features
 * @param ID de type de features
 * @return tableau d'objet de la classe Features
 */
class FeaturesDao extends BaseDao {
    public function findFeaturesByFeatureType($IdtypeFeatures) {
        $stmt = $this->db->prepare("SELECT id,wording,id_type_features as IdTypeFeatures FROM features WHERE id_type_features = ".$IdtypeFeatures );
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
        $stmt = $this->db->query("SELECT id,wording,id_type_features as IdTypeFeatures FROM features WHERE id= ".$id );
        return $stmt->fetchObject(Features::class);
    }
}

?>