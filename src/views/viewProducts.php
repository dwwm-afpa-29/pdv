

<section id="products">
<div class="container-produits">

<?php foreach($articles as $unArticle){  
  if($unArticle->getVisible()==1){?>

    <div class="card">

    <?php if($unArticle->getStock()== 0){
        echo '<p class="dispo">Rupture de stock</p>';
      } ?>

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
              if($feature->getTypeFeatures() == $unFeaturetype->getId()){ ?>
                <div class="valeur">
                <p><strong><?= $feature->getWording(); ?></strong></p>
                </div> 
                <?php
              }
            } ?></p>
          </div>

        <?php } ?>
          
      </div>
          
          
      <div class="incr-buttons">
        <div class="less-button">-</div>
        <div class="quantity">
        </div>
        <div class="more-button">+</div>
      </div>

      <div class="shop-button">
        <a class="snipcart-add-item"
        data-item-id= "<?=$unArticle->getId()?>"
        data-item-price= "<?= $unArticle->getPrice() ?>"
        data-item-name="<?=$unArticle->getName()?>"
        data-item-url="<?="https://pieddevigne.alwaysdata.net/public/index.php?p=Articles/viewProducts/".$unFeaturetype->getId_type_products()."/".$feature->getTypeFeatures()."/".$feature->getId()?>"
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

