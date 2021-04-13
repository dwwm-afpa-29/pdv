<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pied de Vigne</title>
    <!-- DESCRIPTION -->
    <meta name='description' content='Le site e-commerce qui propose le meilleur vin !'>
    <!-- CSS -->
    <link rel='stylesheet' href="assets/css/main.css">
    <!-- GOOGLE FONTS -->
    <!-- Roboto -->
    <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>
    <!-- Quicksand -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Quicksand&display=swap' rel='stylesheet'>
    <!-- Bangers -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Bangers&display=swap' rel='stylesheet'>
    <!-- FONTAWESOME -->
    <script src='https://kit.fontawesome.com/29ef46100e.js' crossorigin='anonymous'></script>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
</head>

<body>

    <!-- HEADER -->
    <header>

        <div class="img-mobile">
            <img src="assets/image/logo4.png" alt="logo">
        </div>
        <!-- BANNIERE -->
        <div class="banniere">
            <a href="<?= A_LINK['accueil'];?>"><img src="assets/image/logo4.png" alt="logo"></a>
            <!-- BOUTONS BANNIERE -->
            <div class="boutons-banniere">
                
                <a class="fill-button " href="<?= A_LINK['inscription_client']; ?>"><span class="fill-button-hover"><span class="fill-button-text">Connexion</span></span></a>
                <a class="fill-button" href="#"><span class="fill-button-hover"><span class="fill-button-text"><i class="fas fa-shopping-cart"></i></span></span></a>
                <p></p>
            </div>

        </div>

        <div class="bouton-mobile">
            <a class="fill-button" href="#"><span class="fill-button-hover"><span
                        class="fill-button-text">Connexion</span></span></a>
        </div>

    </header>

    <div class="nav-mobile">

    </div>

    <!-- NAV -->
    <nav>

        <!-- VINS -->

<?php foreach($allProdTypes as $prodType){?>
    <div class="produits">
            <a href="#">&nbsp;&nbsp;<?= $prodType->getWording() ?>&nbsp;&nbsp;</a>
                <div class="produit menu-deroulant">
            <?php foreach ($allFeatureTypes as $featureType){
            if ($prodType->getId()==$featureType->getId_type_products()){
            ?>
                <h3><?= $featureType->getWording()?></h3>
                <ul>
                <?php foreach (${'features_'.$featureType->getId()} as $feature){                       
                            echo '<li><a href="#">'.$feature->getWording().'</a></li>';                        
                    }
                    echo '</ul>';
                }
                }   ?>
                </div>
    </div>
            <?php } ?>

    </nav>

    <!-- MAIN -->
    <main>

        <?= $view ?? '<p>Aucun affichage possible</p>'; ?>
        
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer1">
            <a href="#">Vins</a>
            <a href="#">Champagnes</a>
            <a href="#">Bières</a>
            <a href="#">Spiritueux</a>
            <a href="#">Sans Alcool</a>
            <a href="<?= A_LINK['afficher_produits'];?>">Épicerie</a>
            <a href="<?= A_LINK['afficher_produits'];?>">Accessoires</a>
        </div>
        <div class="footer2">
            <p>©2021 - DWWM Afpa Brest</p>
        </div>
        <div class="footer3">
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-twitter-square"></i>
            <i class="fab fa-instagram-square"></i>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script src='js/main.js'></script>
</body>
</html>