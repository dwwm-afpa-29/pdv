<form action = "<?= FORM_LINK['signinCustomer']; ?>" method="POST" class = "loginConnex">

    <div class="titreConnex">
        
        <h1>Connexion</h1>
        
    </div>
                    
                           
    <div class ="titre-email-connex"><label for = "mail"><h2>Votre Email</h2></label></div>
    <input type = "email" name="mail" placeholder="courriel@exemple.com" onFocus="this.value='';" class="input email-connex">

    <div class ="titre-passwd-connex"><label for = "passwd"><h2>Votre mot de passe</h2></label></div>
    <input type="password" name="passwd" class="input passwd-connex">

    <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
    <div class = "connex"><input type="submit" id = "submit" value = "Connexion" class = "Button38"></div>
    <div class ="connex-return"><a href = "<?=A_LINK['login_client']; ?>" value = "Retour" class = "Button38">Retour</a></div>
                       
                    
</form>
        
            <input type="hidden" id= "recaptchaResponse2" name= "recaptcha-response">
            <a href = "<?=A_LINK['oublie_mot_de_passe']; ?>" value="Mot de passe oublié" class = "Button38">Mot de passe oublié ?</a>
    
 

    <!-------------------- GESTION DU RECAPTCHA -------------------->

    <script src="https://www.google.com/recaptcha/api.js?render=6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh"></script>


    <script>

            /*-----ReCaptcha-----*/
            
    grecaptcha.ready(function() {
        grecaptcha.execute('6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh', {action: 'submit'}).then(function(token) {
            document.getElementById("recaptchaResponse").value = token;
            document.getElementById("recaptchaResponse2").value = token;
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
