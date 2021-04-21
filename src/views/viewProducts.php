

<section id="products">
<div class="container-produits">

<?php foreach($articles as $unArticle){  
  if($unArticle->getVisible()==1){?>

    <div class="card" data="<?=$unArticle->getId()?>">

      <div class="card-nom">
          <h3><?= $unArticle->getName() ?> <small>0.75L - <?= $unArticle->getDegre() ?>°</small></h3>
      </div>

      <div class="card-image">
        <img src="assets/image/photo_articles/<?= $unArticle->getPhoto() ?>" alt="photo produit">
        <small><?= $unArticle->getPrice() ?>€</small>
      </div>

      <div class="card-infos">
        <a value="<?=$unArticle->getId()?>"></a>
        <?php
        /*echo '<pre>'; 
        print_r($unArticle); echo 
        '</pre>';*/?>
        <?php foreach($featureTypes as $unFeaturetype){ ?>

          <div class="ligne">
            <div class="cle">
            <p><?= $unFeaturetype->getWording()?>: 
            </p>
            </div>
            <?php foreach($unArticle->getFeatures() as $feature){
              if($feature->getIdTypeFeatures() == $unFeaturetype->getId()){ ?>
                <div class="valeur">
                <p><strong><?= $feature->getWording(); ?></strong></p>
                </div> 
                <?php
              }
            } ?></p>
          </div>
          <hr>

        <?php } ?>
          
      </div>
          
          
      <div class="incr-buttons" >
        <div class="less-button" data="<?=$unArticle->getId()?>">-</div>
        <div class="quantity" data="<?=$unArticle->getId()?>">
        <p class = 'count-bouton' data="<?=$unArticle->getId()?>"></p>
        </div>
        <div class="more-button" data="<?=$unArticle->getId()?>">+</div>
      </div>

      <div class="shop-button">
        <a class="snipcart-add-item"
        data-item-id= "<?=$unArticle->getId()?>"
        data-item-price= "<?= $unArticle->getPrice() ?>"
        data-item-name="<?=$unArticle->getName()?>"
        data-item-url="<?="https://pieddevigne.alwaysdata.net/public/index.php?p=Articles/viewProducts/".$unFeaturetype->getId_type_products()."/".$feature->getIdTypeFeatures()."/".$feature->getId()?>"
        data-item-image="<?='assets/image/photo_articles/'.$unArticle->getPhoto()?>"
        data-item-quantity=0
        >Ajouter au panier</a>
      </div>
          
    </div>
  <?php
    }
  } ?>
</div>
</section>

