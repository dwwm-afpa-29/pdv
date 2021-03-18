<h1> Nouveau Mot de passe</h1>


<h2>Veuillez saisir un nouveau mot de passe</h2>

<form action ="<?= FORM_LINK['recoveryPasswordCustomer']; ?>" method = 'POST'>

    <p>
        <label for = "mail"> Votre Email de connexion</label>
        <input type="email" name="mail">
    </p>

    <p>
        <label for = "passwd1"> Nouveau mot de passe</label>
        <input type="password" name="passwd">
    </p>

    <p>
        <label for = "passwd2"> Confirmer votre mot de passe</label>
        <input type="password" name="passwd2">
    </p>

    <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
    <input type = "submit" value = "Enregistrer">

</form>

<!-------------------- GESTION DU RECAPTCHA -------------------->

<script src="https://www.google.com/recaptcha/api.js?render=6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh"></script>


<script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh', {action: 'submit'}).then(function(token) {
                document.getElementById("recaptchaResponse").value = token;
            });
        });
</script>