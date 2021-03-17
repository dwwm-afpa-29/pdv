    <h1>Je suis la vue d'inscription du client</h1>


    <!--------------------SIGNUP-------------------->


    <h2> INSCRIPTION </h2>

    <form action="<?= FORM_LINK['signupBackCustomer']; ?>" method="POST">
        <p>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name">
        </p>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name">
        <p>
            <label for="mail">Email</label>
            <input type="email" name="mail">
        </p>
            <label for="passwd">Mot de passe</label>
            <input type="text" name="passwd">
        <p>
            <label for="address_street">Numéro et nom de la voie</label>
            <input type="text" name="address_street">
        </p>
            <label for="address_zip_code">Code Postale</label>
            <input type="text" name="address_zip_code">
        <p>
            <label for="address_city">Ville</label>
            <input type="text" name="address_city">
        </p>
            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" name="phone_number">
        <p>
            <label for="date_of_birth">Date de naissance</label>
            <input type="date" name="date_of_birth">
        </p>
            <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
            <input type = "submit" value="Inscription">

    </form>

    <!--------------------SIGNIN-------------------->

    <h2> CONNEXION </h2>
    <form action = "<?= FORM_LINK['signinBackCustomer']; ?>" method="POST">
    
        <p>
            <label for = "mail"> Votre Email</label>
            <input type = "email" name="mail">
        </p>

        <p>
            <label for = "passwd">Votre mot de passe</label>
            <input type="password" name="passwd">
        </p>
            <input type="hidden" id= "recaptchaResponse2" name= "recaptcha-response">
            <input type="submit" value = "Connexion">
    
    </form>

    <!--------------------RECOVERY-------------------->


    <h2> MOT DE PASSE OUBLIé </h2>

    <form action = "<?= FORM_LINK['recoveryBackCustomer']; ?>" method="POST">
        <p>
            <label for = "mail"> Votre Email </label>
            <input type = "email" name="mail">
        </p>
            <input type="hidden" id= "recaptchaResponse3" name= "recaptcha-response">
            <input type="submit" value="Mot de passe oublié">
    
    </form>

    <!-------------------- GESTION DU RECAPTCHA -------------------->

    <script src="https://www.google.com/recaptcha/api.js?render=6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh"></script>


    <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh', {action: 'submit'}).then(function(token) {
                    document.getElementById("recaptchaResponse").value = token;
                    document.getElementById("recaptchaResponse2").value = token;
                    document.getElementById("recaptchaResponse3").value = token;
                });
            });
  </script>
