<form method="post" action="<?= FORM_LINK['customer_update_profile']; ?>" class = "modif-profile">

    <div class = "titre-lastname-modif"><label for="last_name">Nom</label></div>
    <input type="text" name="last_name" value="<?= $_SESSION['lastname'] ?? ''; ?>" class = "input lastname-modif">

    <div class = "titre-firstname-modif"><label for="first_name">Prénom</label></div>
    <input class = "input firstname-modif" type="text" name="first_name" value="<?= $_SESSION['firstname'] ?? ''; ?>">

    <div class = "titre-mail-modif"><label for="email">Email</label></div>
    <input class = "input mail-modif" type="email" name="mail" value="<?= $_SESSION['mail'] ?? ''; ?>">

    <div class = "titre-addressStreet-modif"><label for="address_street">Numéro et nom de la voie</label></div>
    <input class ="input addressStreet-modif" type="text" name="address_street" value="<?= $_SESSION['street'] ?? ''; ?>">

    <div class = "titre-addressZip-modif"><label for="address_zip_code">Code Postal</label></div>
    <input class = "addressZip-modif input" type="text" name="address_zip_code" value="<?= $_SESSION['zipCode'] ?? ''; ?>">

    <div class = "titre-addressCity-modif"><label for="address_city">Ville</label></div>
    <input class = "addressCity-modif input" type="text" name="address_city" value="<?= $_SESSION['city'] ?? ''; ?>">

    <div class = "titre-phone-modif"><label for="phone_number">Numéro de téléphone</label></div>
    <input class = "phone-modif input" type="text" name="phone_number" value="<?= $_SESSION['phone'] ?? ''; ?>" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">

    <div class = "titre-date-modif"><label for="date_of_birth">Date de naissance</label></div>
    <input class ="date-modif input" type="date" name="date_of_birth" value="<?= $_SESSION['birth'] ?? ''; ?>">

    <div class = "modif-submit"><input type="submit" name="modifier" value="Valider les changements" class = "Button38"></div>
    <div class ="modif-return"><a href = "<?=A_LINK['customer_home']; ?>" value = "Retour" class = "Button38">Retour</a></div>

    <div class = "modif-mdp"><a href = "<?=A_LINK['oublie_mot_de_passe']; ?>" value="Mot de passe oublié" class = "Button29 slide_inside">Changer de mot de passe</a></div>

</form>
<div class = "modif-confirm">
<?php if($showMessage == 'success') : ?>
    <h3 style = 'color:green'>Les modifications ont été prises en compte</h3>
<?php elseif($showMessage == 'fail') : ?>
    <h3 style = 'color:red'>Erreur lors de la modifications des données</h3>
<?php endif; ?>
</div>