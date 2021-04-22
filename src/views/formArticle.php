<?php
// Affichage du formulaire avec tous les type de produit.
if(isset($message)){echo $message;};
if (!isset($featureTypes)) { ?>
    <form action="<?= FORM_LINK['loadFeatures'] ?>" method="POST">
    <label for="type">Type de produit</label>
    <select name="type">
    <?php foreach ($allProdType as $type) {
        $selected = ($type->getId() == $idProdType)? "selected":""; ?>
       <option value="<?=$type->getId() ?>;<?= $type->getWording()?>" <?=$selected?>><?=$type->getWording()?></option>
    <?php } ?>
    </select>
    <input type="submit" class="Button38" value="ok">
    </form>
<?php } else {?>
<!-- Quand le type de produit est choisi, affichege de tout le formulaire avec les caractéristiques correspondants au type de produits -->
        <form action="<?=FORM_LINK['addNewArticle']?>" method="POST" enctype="multipart/form-data">

        <label for="type">Type de produit</label>
        <select name="type">
        <?php foreach ($allProdType as $type) {
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
            echo '<input type="number" step="0.1" name="degre" value = 0></br>';
        } else {
            echo '<input type="hidden" name="degre" value = 0>';
        };
        echo '<label for="price">prix</label>';
        echo '<input type="number" step="0.01" name="price"></br>';
        echo '<label for="photo">photo</label>';
        echo '<input type="file" name="photo"></br>';
        // Affichage des menus déroulants de chaques caractéristiques correspondants au type de produit sélectionné
        foreach ($featureTypes as $featureType){
            echo '<label for="'.$featureType->getWording().'">'.$featureType->getWording().'</label>';
            $multiple = ($featureType->getWording()== 'Cépages')?"multiple":"";
            $array = ($featureType->getWording()== 'Cépages')?"[]":"";
            echo '<select name="'.$featureType->getWording().$array.'" '.$multiple.'>';
            foreach ($featuresByProductType as $features_table){
                foreach ($features_table as $feature) {
                    if ($feature->getTypeFeatures()==$featureType->getId()){
                        echo '<option value="'.$feature->getId().'">'.$feature->getWording().'</option>';
                    }
                }
            }
            echo '</select>';
            echo '<button class="buttonAddCaract" id="'.$featureType->getId().'" type="button">Ajouter une caractéristique</button><br>';
            echo '<div class= "afficher_'.$featureType->getId().'"></div>';
        }
        echo '<input type="submit" class="Button38" value="Enregistrer">';
        echo '</form>';
}

?>

<script>
$('.buttonAddCaract').click(function() {
    var idDivFeature = $(this).attr('id');
    $.ajax({
        url: '../src/lib/ajax/ajaxRequest.php',
        type:'POST',
        data : 'controller=' + 'ArticlesController' + '&action=' + 'newCaractInArticleForm' + '&idFeatureType=' + idDivFeature,
        dataType: 'html',
        success : function(code_html) {
            $('.afficher_'+idDivFeature).html(code_html);
        },
    });
})
</script>

