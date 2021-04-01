<h1> Nouveau Mot de passe</h1>


<h2>Veuillez saisir un nouveau mot de passe</h2>

<form action ="<?= FORM_LINK['recoveryPasswordCustomer']; ?>" method = 'POST' name = 'recovery'>

    <p>
        <label for = "mail"> Votre Email de connexion</label>
        <input type="email" name="mail">
    </p>

    <p>
        <label for = "passwd1"> Nouveau mot de passe</label>
        <input type="password" name="passwd" id = "passwd1" onkeyup="checkpass()">
    </p>

    <p>
        <label for = "passwd2"> Confirmer votre mot de passe</label>
        <input type="password" name="passwd2" id="passwd2" onkeyup="checkpass()">
        <div id ="passVerif"></div>
    </p>


    <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
    <input type = "submit" value = "Enregistrer" disabled id="submit">

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