<form method="post" action="<?= FORM_LINK['customer_update_profile']; ?>">

    <label for="last_name">Nom</label>
    <input type="text" name="last_name" value="<?= $_SESSION['lastname'] ?? ''; ?>">

    <label for="first_name">Prénom</label>
    <input type="text" name="first_name" value="<?= $_SESSION['firstname'] ?? ''; ?>">

    <label for="email">Email</label>
    <input type="email" name="mail" value="<?= $_SESSION['mail'] ?? ''; ?>">

    <label for="address_street">Numéro et nom de la voie</label>
    <input type="text" name="address_street" value="<?= $_SESSION['street'] ?? ''; ?>">

    <label for="address_zip_code">Code Postale</label>
    <input type="text" name="address_zip_code" value="<?= $_SESSION['zipCode'] ?? ''; ?>">

    <label for="address_city">Ville</label>
    <input type="text" name="address_city" value="<?= $_SESSION['city'] ?? ''; ?>">

    <label for="phone_number">Numéro de téléphone</label>
    <input type="text" name="phone_number" value="<?= $_SESSION['phone'] ?? ''; ?>">

    <label for="date_of_birth">Date de naissance</label>
    <input type="date" name="date_of_birth" value="<?= $_SESSION['birth'] ?? ''; ?>">

    <input type="submit" name="modifier" value="Valider les changements">

</form>

<?php if($showMessage == 'success') : ?>
    <p>Les modifications ont été prises en compte</p>
<?php elseif($showMessage == 'fail') : ?>
    <p>Erreur lors de la modifications des données</p>
<?php endif; ?>