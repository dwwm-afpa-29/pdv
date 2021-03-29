<?php
// Affichage du formulaire avec tous les type de produit.
if (!isset($featureTypes)) {
    echo '<form action="' . FORM_LINK['loadFeatures'] . '" method="POST">';
    echo '<label for="type">Type de produit</label>';
    echo '<select name="type">';
    foreach ($allProdType as $type) {
        $selected = ($type->getId() == $idProdType)? "selected":"";
       echo '<option value="'.$type->getId().';'.$type->getWording().'" '.$selected.'>'.$type->getWording().'</option>';
    }
    echo '</select>';
    echo '<input type="submit" class="Button38" value="ok">';
    echo '</form>'; 

} else {
// Quand le type de produit est choisi, affichege de tout le formulaire avec les caractéristiques correspondants au type de produits
        echo '<form action="' . FORM_LINK['addNewArticle'] . '" method="POST" enctype="multipart/form-data">';

        echo '<label for="type">Type de produit</label>';
        echo '<select name="type">';
        foreach ($allProdType as $type) {
            // Type de produit choisi = sélectionné; formulaire désactivé
            $selected = ($type->getId() == $idProdType)? "selected":"";
           echo '<option disabled="disabled" value="'.$type->getId().'" '.$selected.'>'.$type->getWording().'</option>';
        }
        echo '</select><br>';
            // input non affiché pour garder l'id du type de produit sélectionner dans les résultats du formulaire
        echo '<input name="type" type="hidden" value="'.$idProdType.'">';
    
        echo '<label for="name">Nom de l\'article</label>';
        echo '<input type="text" name="name"></br>';
        //conditionnel pour ne pas affiché le champs degré pour l'épicerie et les accessoires
        if ($wordingProdType != "épicerie" && $wordingProdType != "accessoires") {
            echo '<label for="degre">degré</label>';
            echo '<input type="number" name="degre" value = 0></br>';
        } else {
            echo '<input type="hidden" name="degre" value = 0>';
        };
        echo '<label for="price">prix</label>';
        echo '<input type="number" name="price"></br>';
        echo '<label for="photo">photo</label>';
        echo '<input type="file" name="photo"></br>';
        // Affichage des menus déroulants de chaques caractéristiques correspondants au type de produit sélectionné
        foreach ($featureTypes as $featureType){
            echo '<label for="'.$featureType->getWording().'">'.$featureType->getWording().'</label>';
            $multiple = ($featureType->getWording()== 'cepage')?"multiple":"";
            $array = ($featureType->getWording()== 'cepage')?"[]":"";
            echo '<select name="'.$featureType->getWording().$array.'" '.$multiple.'>';
            foreach ($featuresByProductType as $features_table){
                foreach ($features_table as $feature) {
                    if ($feature->getIdTypeFeatures()==$featureType->getId()){
                        echo '<option value="'.$feature->getId().'">'.$feature->getWording().'</option>';
                    }
                }
            }
            echo '</select><br>';
        }
        echo '<input type="submit" class="Button38" value="Enregistrer">';
        echo '</form>';
}   

?>