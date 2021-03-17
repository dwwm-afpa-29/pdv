<?php

class FeaturesTypeDao extends BaseDao {
    public function findByProdType($typeData) {
        $stmt = $this->db->prepare("SELECT id,wording FROM type_features WHERE id_type_products = ".$typeData);
        $res = $stmt->execute();
        if($res){
            return $stmt->fetchAll(\PDO::FETCH_CLASS, FeaturesType::class);
        }
    }
}

?>