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
    <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.1.0/default/snipcart.css" />
</head>

<body>



    <!-- HEADER -->
    <header>

        <!-- BANNIERE -->
        <div class="banniere">
            <a href="<?= A_LINK['accueil'];?>"><img src="assets/image/logo4.png" alt="logo"></a>
            <!-- BOUTONS BANNIERE -->
            <div class="boutons-banniere">
                
                <a class="fill-button" href="<?php if(empty($_SESSION['firstname'])){ echo A_LINK['login_client'];} else if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'employee'){echo A_LINK['admin_home'];}else{ echo A_LINK['customer_home'];}?>"><span class="fill-button-hover"><span class="fill-button-text"><?php if(empty($_SESSION['firstname'])){ echo 'Connexion';} else { echo 'Mon espace';}  ?></span></span></a>
                <a class="fill-button" href="<?=(empty($_SESSION['firstname']))? A_LINK['login_client'] : '#/cart';?>"><span class="fill-button-hover"><span class="fill-button-text"><i class="fas fa-shopping-cart logo-panier"><sup class="<?=(empty($_SESSION['firstname']))? '' : 'count-product';?>"><span class="<?=(empty($_SESSION['firstname']))? '' : 'snipcart-items-count';?>"></sup></span></i></span></span></span></a>
                <p></p>
            </div>

        </div>

    </header>

    

    <div class="nav-mobile">
        <div class="icone-nav">
            <a href="<?= A_LINK['accueil'];?>"><?php require('assets/image/icones/homeIcon.php'); ?></a>
        </div>
        <div class="icone-nav">
            <a href="<?= A_LINK['afficher_produits_mobile'];?>"><?php require('assets/image/icones/bottlesIcon.php'); ?></a>
        </div>
        <div class="icone-nav">
            <a href="#"><?php require('assets/image/icones/searchIcon.php'); ?></a>
        </div>
        <div class="icone-nav">
            <a href="#/cart"><?php require('assets/image/icones/panierIcon.php'); ?></a>
        </div>
        <div class="icone-nav">
            <a href="<?php if(empty($_SESSION['firstname'])){ echo A_LINK['login_client'];} else if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'employee'){echo A_LINK['admin_home'];}else{ echo A_LINK['customer_home'];}?>"><?php require('assets/image/icones/userIcon.php'); ?></a>
        </div>
    </div>


    <!-- NAV -->
    <nav>

    

        <!-- VINS -->

<?php foreach($allProdTypes as $prodType){?>
    <div class="produits">
            <a href="<?=A_LINK['afficher_produits']."/".$prodType->getId()?>">&nbsp;&nbsp;<?= $prodType->getWording() ?>&nbsp;&nbsp;</a>
                <div class="produit menu-deroulant">
            <?php foreach ($allFeatureTypes as $featureType){
            if ($prodType->getId()==$featureType->getId_type_products()){
            ?>
                <h3><?= $featureType->getWording()?></h3>
                <ul>
                <?php foreach (${'features_'.$featureType->getId()} as $feature){?>                       
                            <li><a href="<?=A_LINK['afficher_produits']."/".$prodType->getId()."/".$featureType->getId()."/".$feature->getId()?>"><?=$feature->getWording()?></a></li>                        
                    <?php }
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
        <?php foreach($allProdTypes as $prodType){?>
            <a href="<?=A_LINK['afficher_produits']."/".$prodType->getId()?>"><?= $prodType->getWording() ?></a>
        <?php } ?>
        </div>
        <div class="footer2">
            <p>??2021 - DWWM Afpa Brest</p>
        </div>
        <div class="footer3">
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-twitter-square"></i>
            <i class="fab fa-instagram-square"></i>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script src='assets/js/main.js'></script>
    <script async src="https://cdn.snipcart.com/themes/v3.1.0/default/snipcart.js"></script>
    <div hidden id="snipcart" style="z-index:100;" data-api-key="ZWMyYTgyYzItNmZkMC00ZDAzLTg0NmQtODgxYzJhN2Q4NDcyNjM3NTQxODI5NjY2Nzc3NzI4"data-currency="eur" data-config-modal-style="side"></div>


    <script>
        document.addEventListener('snipcart.ready', () => {

            Snipcart.events.on('cart.confirmed', (cartConfirmResponse) =>{
                console.log(cartConfirmResponse);
                let data = cartConfirmResponse;
                console.log(data);
                $.ajax ({
                    url: "<?= FORM_LINK['admin_order_completed']?>",
                    type: 'POST',
                    data: {data :  data},
                    success: function(response){
                    console.log("success");
                    }
                })
            })
        })
    </script>
    <script>
        let count = 0;
        
        $("p.count-bouton").html(count);

        $('.card').hover(function() {

            $("p.count-bouton").html(count);

            let id = $(this).attr('data');
            
            let count2=0;
            
            $(".less-button[data ="+id+"]" ).click(function() {
                if(count2>0){

                count2= count2-1;
                
                $("p.count-bouton[data ="+id+"]").html(count2);
                $(".snipcart-add-item").attr("data-item-quantity", count2)
                }else{

                }
            })
      
            $(".more-button[data ="+id+"]").click(function() {

                count2= count2+1;
                
                $("p.count-bouton[data ="+id+"]").html(count2);
                $(".snipcart-add-item").attr("data-item-quantity", count2)

            })
                
            $(".snipcart-add-item").click( function() {
                $("p.count-bouton[data ="+id+"]").html(count);
                count2=0;
            })

            $('.card').mouseleave(function() {
                count2=0;
                $(".snipcart-add-item").attr("data-item-quantity", 1)

            })
        })

    </script>

    <script>
        $(".snipcart-cart__footer").css('visibility','hidden');
    </script>

</body>
</html>

