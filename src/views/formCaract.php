<?php
// Affichage du formulaire avec tous les type de produit.
if (!isset($featureTypes)) {
    echo '<form action="' . FORM_LINK['loadTypeFeatures'] . '" method="POST">';
    echo '<label for="type">Type de produit</label>';
    echo '<select name="type">';
    foreach ($allProdType as $type) {
        $selected = ($type->getId() == $idProdType)? "selected":"";
       echo '<option value="'.$type->getId().';'.$type->getWording().'" '.$selected.'>'.$type->getWording().'</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="ok">';
    echo '</form>'; 

} else {
    echo '<form action="' . FORM_LINK['addNewFeature'] . '" method="POST">';

    echo '<label for="type">Type de produit</label>';
    echo '<select name="type">';
    foreach ($allProdType as $type) {
        // Type de produit choisi = sélectionné; formulaire désactivé
        $selected = ($type->getId() == $idProdType)? "selected":"";
       echo '<option disabled="disabled" value="'.$type->getId().'" '.$selected.'>'.$type->getWording().'</option>';
    }
    echo '</select><br>';

    foreach ($featureTypes as $featureType){
        echo '<label for="'.$featureType->getWording().'">'.$featureType->getWording().'</label>';
        echo '<input type="radio" name="idFeatureType" value= "'.$featureType->getId().'">';
    }
    echo '<br> <input type="text" name="newFeature">';
    echo '<input type="submit">';
}