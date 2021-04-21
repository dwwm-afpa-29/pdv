<section id="products-mobile">

<?php foreach ($allProdTypes as $prodType) {?>

    <a href="<?=A_LINK['afficher_features_mobile']."/".$prodType->getId()?>"><div class="section-type">
        <p><?= $prodType->getWording() ?></p>
        <img src="assets/image/photos_types/<?= $prodType->getPhoto() ?>" alt="bouteilles">
    </div></a>

<?php } ?>

</section>