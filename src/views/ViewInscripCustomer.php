    

    <form action="<?= FORM_LINK['signupCustomer']; ?>" method="POST" name = "inscription" class = "loginInscri">

        <div class = "titreInsc">
            <h1> INSCRIPTION </h1>
        </div>

        
            <div class = "titre-firstname-inscri"><label for="first_name"><h2>Prénom</h2></label></div>
            <input type="text" name="first_name" class = "input firstname-inscri">
        
        
            <div class = "titre-lastname-inscri"><label for="last_name"><h2>Nom</h2></label></div>
            <input type="text" name="last_name" class = "input lastname-inscri">
        
        
            <div class = "titre-phone-inscri"><label for="phone_number"><h2>Numéro de téléphone</h2></label></div>
            <input type="tel" name="phone_number" class = "input phone-inscri" placeholder="0102030405" onFocus="this.value='';" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
        
        
            <div class = "titre-date-inscri"><label for="date_of_birth"><h2>Date de naissance</h2></label></div>
            <input type="date" name="date_of_birth" class = "input date-inscri">
        
        
            <div class = "titre-email-inscri"><label for="mail"><h2>Email</h2></label></div>
            <input type="email" name="mail" placeholder="courriel@exemple.com" onFocus="this.value='';" class="input email-inscri">
        
        
            <div class = "titre-passwd-inscri"><label for="passwd"><h2>Mot de passe</h2></label></div>
            <input type="password" name="passwd" id="passwd1" onkeyup="checkpass()" class="input passwd-inscri">
        
        
            <div class = "titre-passwd2-inscri"><label for = "passwd2"> <h2>Confirmation du mot de passe</h2></label></div>
            <input type="password" name="passwd2" id="passwd2" onkeyup="checkpass()" class="input passwd2-inscri">
            
        
        
            <div class="titre-addressStreet-inscri"><label for="address_street"><h2>Numéro et nom de la voie</h2></label></div>
            <input type="text" name="address_street" class="input addressStreet-inscri">
        
        
            <div class = "titre-addressZip-inscri"><label for="address_zip_code"><h2>Code Postal</h2></label></div>
            <input type="text" name="address_zip_code" class = "input addressZip-inscri">
        
        
            <div class = "titre-addressCity-inscri"><label for="address_city"><h2>Ville</h2></label></div>
            <input type="text" name="address_city" class = "input addressCity-inscri">
        

            <div id = "passVerif-inscri"></div>
        

            <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
            <div class="inscri"><input type = "submit" value="Inscription" id = "submit" disabled class = "Button38 "></div>
            <div class ="inscri-return"><a href = "<?=A_LINK['login_client']; ?>" value = "Retour" class = "Button38">Retour</a></div>

        
    </form>



</div>
    <script src="https://www.google.com/recaptcha/api.js?render=6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh"></script>


<script>
        /*-----ReCaptcha-----*/
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh', {action: 'submit'}).then(function(token) {
                document.getElementById("recaptchaResponse").value = token;
            });
        });

        /*-----Mot de passe identique-----*/

        function checkpass(){
            var passwd1 = document.getElementById("passwd1").value;
            var passwd2 = document.getElementById("passwd2").value;
            var passVerif = document.getElementById("passVerif-inscri");
            let pass1 = document.forms['inscription'].elements['passwd1'];
            let pass2 = document.forms['inscription'].elements['passwd2'];

            if (passwd1 == passwd2) {
                submit.disabled = false;
                passVerif.innerHTML = "<h3><font color='green'>Les mots de passe sont identiques</h3>";
                pass1.style.border = "1px green solid";
                pass2.style.border = "1px green solid";
            }
            else {
                submit.disabled = true;
                passVerif.innerHTML = "<h3><font color='red'>Les mots de passe sont différents</h3>";
                pass1.style.border = "1px red solid";
                pass2.style.border = "1px red solid";
            }
        }

</script>