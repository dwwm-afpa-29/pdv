

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
        <small><?= number_format($unArticle->getPrice(), 2) ?>€</small>
      </div>

      <div class="card-infos">
        <a value="<?=$unArticle->getId()?>"></a>
        <?php foreach($featureTypes as $unFeaturetype){ ?>

          <div class="ligne">
            <div class="cle">
              <p><?= $unFeaturetype->getWording()?>: </p>
              
            </div>
            <?php foreach($unArticle->getFeatures() as $feature){
              if($feature->getTypeFeatures() == $unFeaturetype->getId()){ ?>
                <div class="valeur">
                  <p><strong><?= $feature->getWording(); ?></strong></p>
                </div> 
                <?php
              }
            } ?>
          </div>

        <?php } ?>
          
      </div>
          
       


      <?php if($unArticle->getStock() <= 0){
        echo '<p class="dispo">Rupture de stock</p>';
      } ?>
      <div class="incr-buttons" style ="<?=($unArticle->getStock() <= 0) ? 'visibility : hidden;' : ''; ?>" >
        <div class="less-button" data="<?=$unArticle->getId()?>">-</div>
        <div class="quantity" data="<?=$unArticle->getId()?>">
        <p class = 'count-bouton' data="<?=$unArticle->getId()?>"></p>
        </div>
        <div class="more-button" data="<?=$unArticle->getId()?>">+</div>
      </div>

      <div class="shop-button" style ="<?=($unArticle->getStock()<= 0) ? 'visibility : hidden;' : ''; ?>" >
        <a class='snipcart-add-item'
        data-item-id= "<?=$unArticle->getId()?>"
        data-item-price= "<?=$unArticle->getPrice()?>"
        data-item-name="<?=$unArticle->getName()?>"
        data-item-url="<?="https://pieddevigne.alwaysdata.net/public/index.php?p=Articles/viewProducts/".$unArticle->getProdType()?>"
        data-item-image="<?='assets/image/photo_articles/'.$unArticle->getPhoto()?>"
        data-item-quantity=1 
        >Ajouter au panier</a>
      </div>
          
    </div>
  <?php
    }
  } ?>
</div>
</section>

