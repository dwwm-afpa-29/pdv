<div class = "homeAdmin">

    <div class = "titre-home-admin">
        <h1>
        Bonjour <?= $_SESSION['firstname']; ?>
        </h1>
    </div>
    
        <div class ="customer-home-management"><a href="<?= A_LINK['customer_list']; ?>" class = "Button29 slide_inside">Liste des clients</a></div>
        <div class = "commande-home-admin"><a href="<?= A_LINK['admin_commande_to_do']; ?>" class = "Button29 slide_inside">Commande à préparer</a></div>
        <div class = "historical-home-admin"><a href="<?= A_LINK['admin_commande_done']; ?>" class = "Button29 slide_inside">Historique des commandes</a></div>
        <div class = "product-home-management"><a href="<?= A_LINK['product_management']; ?>" class = "Button29 slide_inside">Gestion des produits</a></div>
        <div class = "modif-home-admin"><a href="<?= A_LINK['admin_profile']; ?>" class = "Button29 slide_inside">Modifier mon profil</a></div>

        <div class = "retour-accueil-admin"><a href="<?= A_LINK['accueil']; ?>" class = "Button38">Accueil</a></div>
        <div class = "deco-home-admin"><a href= "<?= A_LINK['deconnexion'];?>" class = "Button38" >Déconnexion</a></div>

</div>