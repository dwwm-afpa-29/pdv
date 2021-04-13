<div class = listing>
    <div class = list>     
        <table class = "list_client">
        <thead>
            <tr>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Email </th>
            <th> Téléphone </th>
            <?= ($_SESSION['role'] == 'admin') ? '<th> Modifier </th>' : '';?>
            <?= ($_SESSION['role'] == 'admin') ? '<th> Supprimer </th>' : '';?>
            </tr>
            
        </thead>
        <tbody>
                
        <?php foreach($customerList as $customerS): ?>
            <tr class = "row">
            <td><?=$customerS['last_name']?></td>
            <td><?=$customerS['first_name']?></td>
            <td><?=$customerS['mail']?></td>  
            <td><?=$customerS['phone_number']?></td>
            <?=($_SESSION['role']== 'admin') ? ' <td><a href = "'.A_LINK['customer_list'].'/'.$customerS['id'].'">Voir</a></td>' : ''; ?>
            <?=($_SESSION['role']== 'admin') ? ' <td><a href = "'.A_LINK['customer_list'].'/'.$customerS['id'].'">Supprimer</a></td>' : ''; ?>
            </tr>
        <?php endforeach; ?>   
            </tbody>
        </table>
    </div>

    

        <?php if(isset($customer)):?>
            <?php foreach($customer as $key): ?>

                <form action="<?= FORM_LINK['signupCustomer']; ?>" method="POST" name = "inscription" class = "modif-customer-by-admin">

                    <div class = "titreModifByAdmin">
                        <h1> Modifier les données du client </h1>
                    </div>


                        <div class = "titre-firstname-modifByAdmin"><label for="first_name"><h2>Prénom</h2></label></div>
                        <input type="text" name="first_name" class = "input firstname-modifByAdmin" value = "<?=$key['first_name']?? '';?>">


                        <div class = "titre-lastname-modifByAdmin"><label for="last_name"><h2>Nom</h2></label></div>
                        <input type="text" name="last_name" class = "input lastname-modifByAdmin" value = "<?=$key['last_name']?? '';?>">


                        <div class = "titre-phone-modifByAdmin"><label for="phone_number"><h2>Numéro de téléphone</h2></label></div>
                        <input type="tel" name="phone_number" class = "input phone-modifByAdmin" placeholder="0102030405" onFocus="this.value='';" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value = "<?=$key['phone_number']?? '';?>">


                        <div class = "titre-date-modifByAdmin"><label for="date_of_birth"><h2>Date de naissance</h2></label></div>
                        <input type="date" name="date_of_birth" class = "input date-modifByAdmin" value = "<?=$key['date_of_birth']?? '';?>">


                        <div class = "titre-email-modifByAdmin"><label for="mail"><h2>Email</h2></label></div>
                        <input type="email" name="mail" class="input email-modifByAdmin" value = "<?=$key['mail']?? '';?>">                                   


                        <div class="titre-addressStreet-modifByAdmin"><label for="address_street"><h2>Numéro et nom de la voie</h2></label></div>
                        <input type="text" name="address_street" class="input addressStreet-modifByAdmin" value = "<?=$key['address_street']?? '';?>">


                        <div class = "titre-addressZip-modifByAdmin"><label for="address_zip_code"><h2>Code Postal</h2></label></div>
                        <input type="text" name="address_zip_code" pattern="[0-9]{5}" class = "input addressZip-modifByAdmin" value = "<?=$key['address_zip_code']?? '';?>">


                        <div class = "titre-addressCity-modifByAdmin"><label for="address_city"><h2>Ville</h2></label></div>
                        <input type="text" name="address_city" class = "input addressCity-modifByAdmin" value = "<?=$key['address_city']?? '';?>">

                        <div class = "titre-roleUser-modifByAdmin"><label for="role_user"><h2>Rôle</h2></label></div>
                        <div class = "radio-toolbar roleUser-modifByAdmin">
                            <input type="radio" name="roleUser" id = "radio1" value = "<?=$key['role_user']?? 'admin';?>" <?=($key['role_user'] == 'admin') ? 'checked' : '';?>>
                            <label for="radio1">Admin</label>
                            <input type="radio" name="roleUser" id = "radio2" value = "<?=$key['role_user']?? 'employee';?>"<?=($key['role_user'] == 'admin') ? 'checked' : '';?>>
                            <label for="radio2">Employé</label>
                            <input type="radio" name="roleUser" id = "radio3" value = "<?=$key['role_user']?? 'customer';?>"<?=($key['role_user'] == '') ? 'checked' : 'customer';?>>
                            <label for="radio3">Client</label>


                        <div id = "Verif-modifByAdmin"></div>


                        <div class="modifByAdmin"><input type = "submit" value="Valider" id = "submit" disabled class = "Button38 "></div>


                </form>
            
            <?php endforeach; ?>
        <?php endif; ?>


    
<?php 



/*echo "<pre>";
echo (var_dump($customerList));
echo "</pre>";*/