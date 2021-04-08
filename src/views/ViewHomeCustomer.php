<h1>
   Bonjour <?= $_SESSION['firstname']; ?>
</h1>

<p>
    <a href="<?= A_LINK['customer_profile']; ?>">Modifier mon profil</a>
    <a href="">Mes commandes en cours</a>
    <a href="<?= A_LINK['customer_historical']; ?>">Historique de mes commandes</a>
</p>