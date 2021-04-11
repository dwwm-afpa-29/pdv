<div class = "homeAdmin">

    <div class = "titre-home-admin">
        <h1>
        Bonjour <?= $_SESSION['firstname']; ?>
        </h1>
    </div>
    
        <div class ="customer-home-management"><a href="<?= A_LINK['customer_list']; ?>" class = "Button38">Liste des clients</a></div>
        <div class = "commande-home-admin"><a href="<?= A_LINK['admin_commande_to_do']; ?>" class = "Button38">Commande à préparer</a></div>
        <div class = "historical-home-admin"><a href="<?= A_LINK['admin_commande_done']; ?>" class = "Button38">Historique des commandes</a></div>
        <div class = "product-home-management"><a href="<?= A_LINK['product_management']; ?>" class = "Button38">Gestion des produits</a></div>
        <div class = "modif-home-admin"><a href="<?= A_LINK['admin_profile']; ?>" class = "Button38">Modifier mon profil</a></div>

        
        <div class = "deco-home-admin"><a href= "<?= A_LINK['deconnexion'];?>" class = "Button38" >Déconnexion</a></div>

</div>