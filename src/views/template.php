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

        <!-- BANNIERE -->
        <div class="banniere">
            <a href="<?= A_LINK['accueil'];?>"><img src="assets/image/logo4.png" alt="logo" class="logo"></a>
            <!-- BOUTONS BANNIERE -->
            <div class="boutons-banniere">
                
                <a class="fill-button" href="<?php if(empty($_SESSION['firstname'])){ echo(A_LINK['login_client']);} else {echo (A_LINK['customer_home']);}?>"><span class="fill-button-hover"><span class="fill-button-text"><?php if(empty($_SESSION['firstname'])){ echo('Connexion');} else { echo('Mon espace');}  ?></span></span></a>
                <a class="fill-button" href="#"><span class="fill-button-hover"><span class="fill-button-text"><i class="fas fa-shopping-cart"></i></span></span></a>
                
            </div>

        </div>

        <div class="bouton-mobile">
            <a class="fill-button" href="<?php if(empty($_SESSION['firstname'])){ echo(A_LINK['login_client']);} else {echo (A_LINK['customer_home']);} ?>"><span class="fill-button-hover"><span class="fill-button-text"><?php if(empty($_SESSION['firstname'])){ echo('Connexion');} else { echo('Mon espace');}  ?></span></span></a>
        </div>

        <div class="nav-mobile">
            <div class="icone-nav"><a href="#" class="fas fa-wine-bottle"></a></div>
            <div class="icone-nav"><a href="#" class="fas fa-search"></a></div>
            <div class="icone-nav"><a href="#" class="fas fa-shopping-cart"></a></div>
            <div class="icone-nav"><a href="#" class="far fa-user-circle"></a></div>
        </div>

    </header>

    

    <!-- NAV -->
    <nav>

        <!-- VINS -->
        <div class="produits">

            <a href="#">&nbsp;&nbsp;Vins&nbsp;&nbsp;</a>
            <div class="produit menu-deroulant">

                <!-- COULEURS -->
                <h3>Couleurs</h3>
                <ul>
                    <li><a href="#">Vins Rouges</a></li>
                    <li><a href="#">Vins Blancs</a></li>
                    <li><a href="#">Vins Rosés</a></li>
                </ul>

                <!-- RÉGIONS -->
                <h3>Régions</h3>
                <ul>
                    <li><a href="#">Bordeaux</a></li>
                    <li><a href="#">Bourgogne</a></li>
                    <li><a href="#">Loire</a></li>
                    <li><a href="#">Alsace</a></li>
                    <li><a href="#">Mars</a></li>
                </ul>

                <!-- CÉPAGES -->
                <h3>Cépages</h3>
                <ul>
                    <li><a href="#">Pinot</a></li>
                    <li><a href="#">Chardonnay</a></li>
                    <li><a href="#">Merlot</a></li>
                    <li><a href="#">Sauvignon</a></li>
                    <li><a href="#">Grenache</a></li>
                </ul>

                <a href="#">Promotions</a>
                <a href="#">Nouveautés</a>

            </div>

        </div>

        <!-- CHAMPAGNES -->
        <div class="produits">
        
            <a href="#">Champagnes</a>
            <div class="produit menu-deroulant">
        
                <!-- COULEURS -->
                <h3>Couleurs</h3>
                <ul>
                    <li><a href="#">Blanc</a></li>
                    <li><a href="#">Rosé</a></li>
                </ul>
        
                <!-- VARIÉTÉS -->
                <h3>Variétés</h3>
                <ul>
                    <li><a href="#">Bruts</a></li>
                    <li><a href="#">Extra Bruts</a></li>
                    <li><a href="#">Blanc de blancs</a></li>
                    <li><a href="#">Blanc de noirs</a></li>
                    <li><a href="#">Millésimés</a></li>
                </ul>

                <a href="#">Promotions</a>
                <a href="#">Nouveautés</a>
        
            </div>
        
        </div>

        <!-- BIERES -->
        <div class="produits">
        
            <a href="#">Bières</a>
            <div class="produit menu-deroulant">
        
                <!-- COULEURS -->
                <h3>Couleurs</h3>
                <ul>
                    <li><a href="#">Bières blondes</a></li>
                    <li><a href="#">Bières brunes</a></li>
                    <li><a href="#">Bières blanches</a></li>
                    <li><a href="#">Bières rousses</a></li>
                </ul>
        
                <!-- RÉGIONS -->
                <h3>Régions</h3>
                <ul>
                    <li><a href="#">Bretagne</a></li>
                    <li><a href="#">Corse</a></li>
                    <li><a href="#">Pays Basque</a></li>
                    <li><a href="#">Centre</a></li>
                    <li><a href="#">Est</a></li>
                </ul>

                <a href="#">Promotions</a>
                <a href="#">Nouveautés</a>
        
            </div>
        
        </div>

        <!-- SPIRITUEUX -->
        <div class="produits">
        
            <a href="#">Spiritueux</a>
            <div class="produit menu-deroulant">
        
                <!-- APÉRITIFS -->
                <h3>Apéritifs</h3>
                <ul>
                    <li><a href="#">Pastis et Anisés</a></li>
                    <li><a href="#">Rhums</a></li>
                    <li><a href="#">Vodka</a></li>
                    <li><a href="#">Gins et Tequila</a></li>
                    <li><a href="#">Vins doux, Porto</a></li>
                    <li><a href="#">Whiskys</a></li>
                </ul>
        
                <!-- COCKTAILS -->
                <h3>Cocktails</h3>
                <ul>
                    <li><a href="#">Punch</a></li>
                    <li><a href="#">Cocktails Divers</a></li>
                </ul>

                <!-- DIGESTIFS -->
                <h3>Digestifs</h3>
                <ul>
                    <li><a href="#">Liqueurs</a></li>
                    <li><a href="#">Cognac</a></li>
                </ul>

                <a href="#">Promotions</a>
                <a href="#">Nouveautés</a>
        
            </div>
        
        </div>

        <!-- SANS ALCOOL -->
        <div class="produits">
        
            <a href="#">Sans Alcool</a>
            <div class="produit menu-deroulant">
        
                <!-- SODAS -->
                <h3>Sodas</h3>
                <ul>
                    <li><a href="#">Colas</a></li>
                    <li><a href="#">Fruits</a></li>
                    <li><a href="#">Limonades</a></li>
                </ul>
        
                <!-- JUS DE FRUITS -->
                <h3>Jus de Fruits</h3>
                <ul>
                    <li><a href="#">Orange</a></li>
                    <li><a href="#">Pommes</a></li>
                    <li><a href="#">Raisins</a></li>
                    <li><a href="#">Divers</a></li>
                </ul>
        
                <a href="#">Promotions</a>
                <a href="#">Nouveautés</a>
        
            </div>
        
        </div>

        <!-- ÉPICERIE -->
        <div class="produits">
        
            <a href="<?= A_LINK['afficher_produits'];?>">Épicerie</a>
        
        </div>

        <!-- ACCESSOIRES -->
        <div class="produits">
        
            <a href="<?= A_LINK['afficher_produits'];?>">Accessoires</a>
        
        </div>

        <div class="recherche">
            <input type="text" placeholder="Rechercher">
            <button type="submit">OK</button>
        </div>

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
    <script src='assets/js/main.js'></script>
</body>
</html>