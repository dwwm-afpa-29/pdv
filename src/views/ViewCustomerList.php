<div class = listing>
    <div class = list>  

        <div class = "retour-listing"><a href = "<?=A_LINK ['admin_home']?>" class="Button38">Retour</a></div> 

        <div class = "table">
            <table class = "list_client">
            <thead>
                <tr>
                <th> Nom </th>
                <th> Prénom </th>
                <th> Email </th>
                <th> Téléphone </th>
                <th> Editer </th>
                </tr>
                
            </thead>
            <tbody>
                    
            <?php foreach($customerList as $customerS): ?>
                <tr class = "row">
                <td><?=$customerS['last_name']?></td>
                <td><?=$customerS['first_name']?></td>
                <td><?=$customerS['mail']?></td>  
                <td><?=$customerS['phone_number']?></td>
                <?=($_SESSION['role']== 'admin' || $_SESSION['role']==  'employee') ? ' <td><a  href = "'.A_LINK['customer_list'].'/'.$customerS['id'].'">Voir le client</a></td>' : ''; ?>
                </tr>
            <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
    </div>

    

        <?php if(isset($customer)):?>
            <?php foreach($customer as $key): ?>

                <form action="<?= FORM_LINK['customer_update_by_admin']; ?>" method="POST" name = "inscription" class = "modif-customer-by-admin">

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
                            <input type="radio" name="role_user" id = "radio1" value = "admin" <?=($key['role_user'] == 'admin') ? 'checked' : '';?>>
                            <label for="radio1">Admin</label>
                            <input type="radio" name="role_user" id = "radio2" value = "employee"<?=($key['role_user'] == 'employee') ? 'checked' : '';?>>
                            <label for="radio2">Employé</label>
                            <input type="radio" name="role_user" id = "radio3" value = "customer"<?=($key['role_user'] ==  'customer') ? 'checked' : '';?>>
                            <label for="radio3">Client</label>
                        </div>

                        <div class = "modifByAdmin"> <input type = "<?=($_SESSION['role'] == 'employee') ? 'hidden' : 'submit';?>" value="Valider les changements" name="modifier" class = "Button38 modifByAdmin"></div>
                        <div class = "deleteByAdmin"><input type = "<?=($_SESSION['role'] == 'employee') ? 'hidden' : 'submit';?>" value = "Supprimer l'utilisateur" name = "supprimer" class = "Button38 modifByAdmin"></div>
                    

                        <input type="hidden" name="id_user" value = "<?=$key['id']?? '';?>">

                </form>
            
                
            <?php endforeach; ?>
        <?php endif; ?>

 



