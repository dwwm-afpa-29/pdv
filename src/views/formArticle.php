<?php
if (!isset($featureTypes)) {
    echo '<form action="' . FORM_LINK['loadFeatures'] . '" method="POST">';
    echo '<label for="type">Type de produit</label>';
    echo '<select name="type">';
    foreach ($allProdType as $type) {
        $selected = ($type->getId() == $idProdType)? "selected":"";
       echo '<option value="'.$type->getId().';'.$type->getWording().'" '.$selected.'>'.$type->getWording().'</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="ok">';
    echo '</form>'; 
} 


if (isset($featureTypes)) {
    echo '<form action="' . FORM_LINK['addNewArticle'] . '" method="POST">';

    echo '<label for="type">Type de produit</label>';
    echo '<select name="type">';
    foreach ($allProdType as $type) {
        $selected = ($type->getId() == $idProdType)? "selected":"";
       echo '<option disabled="disabled" value="'.$type->getId().'" '.$selected.'>'.$type->getWording().'</option>';
    }
    echo '</select><br>';

    echo '<input name="type" type="hidden" value="'.$idProdType.'">';

    echo '<label for="name">Nom de l\'article</label>';
    echo '<input type="text" name="name"></br>';
    if ($wordingProdType != "épicerie" && $wordingProdType != "accessoires") {
        echo '<label for="degre">degré</label>';
        echo '<input type="number" name="degre" value = 0></br>';
    } else {
        echo '<input type="hidden" name="degre" value = 0>';
    };
    echo '<label for="price">prix</label>';
    echo '<input type="number" name="price"></br>';
    echo '<label for="photo">photo</label>';
    echo '<input type="text" name="photo"></br>';

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
    echo '<input type="submit" value="Enregistrer">';
    echo '</form>';
}
?>