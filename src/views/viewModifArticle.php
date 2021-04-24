<form action="<?=FORM_LINK['updateArticle']."/".$idOfArticleToModify?>" method="POST" enctype="multipart/form-data" class = "form-article">
<div class="Article-info-principal">
        <label for="type">Type de produit</label>
        <select name="type">
        <?php foreach ($allProdType as $type) {
            // Type de produit choisi = sélectionné; formulaire désactivé
            $selected = ($type->getId() == $articleToModify->getProdType()->getId())? "selected":""; ?>
           <option disabled="disabled" value="<?=$type->getId()?>" <?=$selected?>><?=$type->getWording()?></option>
        <?php } ?>
        </select><br>
            <!-- input non affiché pour garder l'id du type de produit sélectionner dans les résultats du formulaire -->
        <input name="type" type="hidden" value="<?=$articleToModify->getProdType()->getId()?>">
    
        <label for="name">Nom de l'article</label>
        <input type="text" name="name" value="<?=$articleToModify->getName()?>"></br>

        <label for="visible">Visibilité de l'article</label>
        <select name="visible">
            <?php if($articleToModify->getVisible()== 1){ ?>
            <option value="1" selected>oui</option>
            <option value="2">non</option>
            <?php } else { ?>
            <option value="1">oui</option>
            <option value="2" selected>non</option>
            <?php } ?>
        </select>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value = <?=$articleToModify->getStock()?>></br>

        <!-- conditionnel pour ne pas affiché le champs degré pour l'épicerie et les accessoires -->
        <?php if ($articleToModify->getProdType()->getWording() != "épicerie" && $articleToModify->getProdType()->getWording() != "accessoires") { ?>
            <label for="degre">degré</label>
            <input type="number" step="0.1" name="degre" value = <?=$articleToModify->getDegre()?>></br>
        <?php } else { ?>
            <input type="hidden" name="degre" value = 0>
        <?php }; ?>
        <label for="price">prix</label>
        <input type="number" step="0.01" name="price" value = <?=$articleToModify->getPrice()?>></br>
        </div>
        <!-- <label for="photo">photo</label>
        <input type="file" name="photo"></br> -->
        <!-- Affichage des menus déroulants de chaques caractéristiques correspondants au type de produit sélectionné -->
        <div class="form-article-features">
        <?php foreach ($featureTypes as $featureType){
            echo '<label for="'.$featureType->getWording().'">'.$featureType->getWording().'</label>';
            $multiple = ($featureType->getWording()== 'Cépages')?"multiple":"";
            $array = ($featureType->getWording()== 'Cépages')?"[]":"";
            echo '<select name="'.$featureType->getWording().$array.'" '.$multiple.'>';
            foreach ($featuresByProductType as $features_table){
                foreach ($features_table as $feature) {
                    if ($feature->getTypeFeatures()==$featureType->getId()){
                        foreach($articleToModify->getFeatures() as $articleFeature){
                            $selectedFeat = "";
                            if($feature->getId() == $articleFeature->getId()){
                                $selectedFeat = "selected";
                                break;
                            }
                        }
                        echo '<option value="'.$feature->getId().'" '.$selectedFeat.'>'.$feature->getWording().'</option>';
                    }
                }
            } ?>
            </select>
            <button class="buttonAddCaract" id="<?=$featureType->getId()?>" type="button">Ajouter une caractéristique</button><br>
            <div class= "afficher_<?=$featureType->getId()?>"></div>
        <?php } ?>
        </div>
        <input type="submit" class="Button38" value="Enregistrer Modifications">
        </form>


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