<form action = "<?= FORM_LINK['recoveryCustomer']; ?>" method="POST" class="loginForget">

    <div class = "titreForget">
        <h1>Recevoir un lien de récupération</h1>
    </div>

        <div class = "titre-forget-mail"><label for = "mail"><h2>Votre Email</h2></label></div>
        <input type = "email" name="mail" placeholder="courriel@exemple.com" onFocus="this.value='';" class= "input forget-mail">
            
        <input type="hidden" id= "recaptchaResponse" name= "recaptcha-response">
        <div class ="forget"><input type="submit" id="submit" value="Envoyer" class = "Button38"></div>
        <div class ="forget-return"><a href = "<?=A_LINK['login_client']; ?>" value = "Retour" class = "Button38">Retour</a></div>
        
</form>
        
 


    <!-------------------- GESTION DU RECAPTCHA -------------------->

    <script src="https://www.google.com/recaptcha/api.js?render=6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh"></script>

    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Le0VXgaAAAAADWW3lXLqdAHq5A8Ugcq1s9yjCCh', {action: 'submit'}).then(function(token) {
            document.getElementById("recaptchaResponse").value = token;
        });0
    });

</script>