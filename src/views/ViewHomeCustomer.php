<div class = "homeCustomer">

    <div class = "titre-home">
        <h1>
        Bonjour <?= $_SESSION['firstname']; ?>
        </h1>
    </div>
    
        <div class ="modif-home-customer"><a href="<?= A_LINK['customer_profile']; ?>" class = "Button38">Modifier mon profil</a></div>
        <div class = "commande-home-customer"><a href="" class = "Button38">Mes commandes en cours</a></div>
        <div class = "historical-home-customer"><a href="<?= A_LINK['customer_historical']; ?>" class = "Button38">Historique de mes commandes</a></div>

        
        <div class = "deco-home-customer"><a href= "<?= A_LINK['deconnexion'];?>" class = "Button38" >Déconnexion</a></div>

</div>