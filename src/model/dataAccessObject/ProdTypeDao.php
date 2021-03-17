<?php

class ProdTypeDao extends BaseDao{
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM type_products");
        $res = $stmt->execute();
        if($res){
            $prodTypes = $stmt->fetchAll(\PDO::FETCH_CLASS, ProdType::class);
            return $prodTypes;
        }
    }
}

?>