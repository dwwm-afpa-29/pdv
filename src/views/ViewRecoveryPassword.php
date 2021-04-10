

<form action ="<?= FORM_LINK['recoveryPasswordCustomer']; ?>" method = 'POST' name = 'recovery' class="loginRecovery">

    <div class = "titreRecovery">
        <h2>Veuillez saisir un nouveau mot de passe</h2>
    </div>
       

    
        <div class = "titre-email-recovery"><label for = "mail"> Votre Email de connexion</label></div>
        <input type="email" name="mail" placeholder="courriel@exemple.com" onFocus="this.value='';" class ="input email-recovery">
    
    
        <div class = "titre-passwd-recovery"><label for = "passwd1"> Nouveau mot de passe</label></div>
        <input type="password" name="passwd" id = "passwd1" onkeyup="checkpass()" class="input passwd-recovery">
    
    
        <div class="titre-passwd2-recovery"><label for = "passwd2"> Confirmation du mot de passe</label></div>
        <input type="password" name="passwd2" id="passwd2" onkeyup="checkpass()" class="input passwd2-recovery">
        <div id = "passVerif"></div>

        <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
        <div class = "recovery"><input type = "submit" value = "Enregistrer" disabled id="submit" class="Button38"></div>


</form>

<!-------------------- GESTION DU RECAPTCHA -------------------->

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
            var passVerif = document.getElementById("passVerif");
            let pass1 = document.forms['recovery'].elements['passwd1'];
            let pass2 = document.forms['recovery'].elements['passwd2'];

            if (passwd1 == passwd2) {
                passVerif.innerHTML = "<h3><font color='green'>Les mots de passe sont identiques</h3>";
                submit.disabled = false;
                pass1.style.border = "1px green solid";
                pass2.style.border = "1px green solid";
            }
            else {
                passVerif.innerHTML = "<h3><font color='red'>Les mots de passe sont différents</h3>";
                submit.disabled = true;
                pass1.style.border = "1px red solid";
                pass2.style.border = "1px red solid";
            }
        }

</script>