<section id="products-mobile">

    <?php foreach ($featureTypes as $featureType) {?>

    <div class="display-features">
        <h3><?= $featureType->getWording() ?></h3>

        <ul>
        <?php foreach ($features as $feature) {?>
            <?php if ($feature->getTypeFeatures() == $featureType->getId()) {?>
                
                <li><a href="<?=A_LINK['afficher_produits']."/".$featureType->getId_type_products()."/".$featureType->getId()."/".$feature->getId()?>"><?= $feature->getWording() ?></a></li>
            <?php } ?>
        <?php } ?>
        </ul>

    </div>

    <?php } ?>

</section>