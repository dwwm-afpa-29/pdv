<?php

class FeaturesDao extends BaseDao {
    public function findFeaturesByFeatureType($IdtypeFeatures) {
        $stmt = $this->db->prepare("SELECT id,wording,id_type_features as IdTypeFeatures FROM features WHERE id_type_features = ".$IdtypeFeatures );
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Features::class);
        }
    }
    public function findFeaturesByID($id) {
        $stmt = $this->db->query("SELECT id,wording,id_type_features as IdTypeFeatures FROM features WHERE id= ".$id );
        return $stmt->fetchObject(Features::class);
    }
}

?>