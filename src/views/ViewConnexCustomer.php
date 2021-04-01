    <h1>Je suis la vue d'inscription du client</h1>


    <!--------------------SIGNUP-------------------->


    <h2> INSCRIPTION </h2>

    <form action="<?= FORM_LINK['signupCustomer']; ?>" method="POST" name = "inscription">
        <p>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name">
        </p>
        <p>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name">
        </p>
        <p>
            <label for="mail">Email</label>
            <input type="email" name="mail">
        </p>
        <p>
            <label for="passwd">Mot de passe</label>
            <input type="text" name="passwd" id="passwd1" onkeyup="checkpass()">
        </p>
        <p>
            <label for = "passwd2"> Confirmer votre mot de passe</label>
            <input type="password" name="passwd2" id="passwd2" onkeyup="checkpass()">
            <div id ="passVerif"></div>
        </p>
        <p>
            <label for="address_street">Numéro et nom de la voie</label>
            <input type="text" name="address_street">
        </p>
        <p>
            <label for="address_zip_code">Code Postale</label>
            <input type="text" name="address_zip_code">
        </p>
        <p>
            <label for="address_city">Ville</label>
            <input type="text" name="address_city">
        </p>
        <p>
            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" name="phone_number">
        </p>
        <p>
            <label for="date_of_birth">Date de naissance</label>
            <input type="date" name="date_of_birth">
        </p>

            <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
            <input type = "submit" value="Inscription" id = "submit" disabled>

    </form>

    <!--------------------SIGNIN-------------------->

    <h2> CONNEXION </h2>
    <form action = "<?= FORM_LINK['signinCustomer']; ?>" method="POST">
    
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

    <form action = "<?= FORM_LINK['recoveryCustomer']; ?>" method="POST">
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

            /*-----ReCaptcha-----*/
            
    grecaptcha.ready(function() {
        grecaptcha.execute('6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh', {action: 'submit'}).then(function(token) {
            document.getElementById("recaptchaResponse").value = token;
            document.getElementById("recaptchaResponse2").value = token;
            document.getElementById("recaptchaResponse3").value = token;
        });
    });

            /*-----Mot de passe identique-----*/

    function checkpass(){
        let passwd1 = document.getElementById("passwd1").value;
        let passwd2 = document.getElementById("passwd2").value;
        let passVerif = document.getElementById("passVerif");
        let pass1 = document.forms['inscription'].elements['passwd1'];
        let pass2 = document.forms['inscription'].elements['passwd2'];

        if (passwd1 == passwd2) {
            passVerif.innerHTML = "Les mots de passe sont identiques";
            submit.disabled = false;
            pass1.style.border = "1px green solid";
            pass2.style.border = "1px green solid";
        }
        else {
            passVerif.innerHTML = "Les mots de passe sont différents";
            submit.disabled = true;
            pass1.style.border = "1px red solid";
            pass2.style.border = "1px red solid";
        }
    }
  </script>
