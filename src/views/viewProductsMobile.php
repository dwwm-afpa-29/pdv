<section id="products-mobile">

<?php foreach($allProdTypes as $prodType){?>
    <div class="section-type">
        <p><?= $prodType->getWording() ?></p>
        
    </div>
<?php } ?>

</section>