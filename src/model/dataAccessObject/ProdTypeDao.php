<?php

/**
 * récupéré tous les types de produits de la bdd
 * @return tableau d'objet de class ProdType
 */
class ProdTypeDao extends BaseDao{
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM type_products");
        $res = $stmt->execute();
        if($res){
            $prodTypes = $stmt->fetchAll(\PDO::FETCH_CLASS, ProdType::class);
            return $prodTypes;
        }
    }

    public function findById($id){
        $stmt = $this->db->query("SELECT * FROM type_products WHERE id = ".$id );
        return $stmt->fetchObject(ProdType::class);
    }
}

?>