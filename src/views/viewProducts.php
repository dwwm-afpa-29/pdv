

<section id="products">
<div class="container-produits">

<?php foreach($articles as $unArticle){  ?>
  <div class="card">
    <div class="card-image">
      <img src="assets/image/photo_articles/<?= $unArticle->getPhoto() ?>" alt="photo produit">
    </div>
    <div class="card-infos">
      <h3><?= $unArticle->getName() ?></h3>
      <a value="<?=$unArticle->getId()?>"></a>
      <p>Degré: <?= $unArticle->getDegre() ?>°</p>
      <?php
      /*echo '<pre>'; 
      print_r($unArticle); echo 
      '</pre>';*/?>
      <?php foreach($featureTypes as $unFeaturetype){ ?>
        <p><?= $unFeaturetype->getWording()?>: 
        <?php foreach($unArticle->getFeatures() as $feature){
          if($feature->getIdTypeFeatures() == $unFeaturetype->getId()){
            echo $feature->getWording();
            /*echo '<pre>'; 
            print_r($feature); echo 
            '</pre>';*/
          }
        } ?></p>
      <?php } ?>
      <p>75cl</p>
    </div>
    <div class="card-price">
      <p>Prix: <?= $unArticle->getPrice() ?></p>
      <div class="button-fav">
        <a href=""><img src="assets/image/icones/star.png" alt="favoris"></a>
      </div>
    </div>
    <div class="card-buttons">
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
        data-item-url="<?="https://pieddevigne.alwaysdata.net/public/index.php?p=Articles/viewProducts/".$unFeaturetype->getId_type_products()."/".$feature->getIdTypeFeatures()."/".$feature->getId()?>"
        data-item-image="<?='assets/image/photo_articles/'.$unArticle->getPhoto()?>"
        data-item-quantity=0
        >Ajouter au panier</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</section>

<!-- 

  <div class="card">
    <div class="card-image">
      <img src="assets/image/testVin.png" alt="photo produit">
    </div>
    <div class="card-infos">
      <h3>Nom</h3>
      <p>Région - Cépage</p>
      <p>Degré</p>
      <p>Année</p>
      <p>Volume</p>
    </div>
    <div class="card-price">
      <p>Prix</p>
      <div class="button-fav">
        <a href=""><img src="assets/image/icones/star.png" alt="favoris"></a>
      </div>
    </div>
    <div class="card-buttons">
      <div class="incr-buttons">
        <div class="less-button">-</div>
        <div class="quantity">
          <p>0</p>
        </div>
        <div class="more-button">+</div>
      </div>
      <div class="shop-button">
        <a href="add">Ajouter au panier</a>
      </div>
    </div>
  </div>
 -->

