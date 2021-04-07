<?php

    echo '<label for="'.$featureType->getWording().'">'.$featureType->getWording().'</label>';
    echo '<br> <input type="text" id="valeur" name="newFeature">';
    echo '<button class="recordCaract" id="'.$featureType->getId().'" type="button">enregistrer</button><br>';
    echo '<div class= "afficher_'.$featureType->getId().'"></div>';
    ?>

    <script>
$('.recordCaract').click(function() {
    var newFeature = $('#valeur').val();
    var idFeatureType = <?php echo $featureType->getId(); ?>;
    $.ajax({
        url: '../src/lib/ajax/addNewCaractFromFormArticle.php',
        type:'POST',
        data : 'newFeature=' + newFeature + '&idFeatureType=' + idFeatureType,
        dataType: 'html',
        success : function(code_html) {
            $('.afficher_' + idFeatureType).html(code_html);
        },
    });
})
</script>
