<div class = "homeCustomer">

    <div class = "titre-home">
        <h1>
        Bonjour <?= $_SESSION['firstname']; ?>
        </h1>
    </div>
    
        <div class ="modif-home-customer"><a href="<?= A_LINK['customer_profile']; ?>" class = "Button29 slide_inside">Modifier mon profil</a></div>
        <div class = "commande-home-customer"><a href="" class = "Button29 slide_inside">Mes commandes en cours</a></div>
        <div class = "historical-home-customer"><a href="<?= A_LINK['customer_historical']; ?>" class = "Button29 slide_inside">Historique de mes commandes</a></div>

        
        <div class = "deco-home-customer"><a href= "<?= A_LINK['deconnexion'];?>" class = "Button38" >Déconnexion</a></div>

</div>