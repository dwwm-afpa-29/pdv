<?php $i = 0 ?>
<div class = listing>
    <div class = list>     
        <table class = "list_client">
        <thead>
            <tr>
            <th> Nom </th>
            <th> Prénom </th>
            <th>  Email </th>
            <th> Téléphone </th>
            <th> Modifier </th>
            </tr>
            
        </thead>
        <tbody>
                
        <?php foreach($customerList as $customer): ?>
            <tr class = "row">
            <td><?=$customer['last_name']?></td>
            <td><?=$customer['first_name']?></td>
            <td><?=$customer['mail']?></td>  
            <td><?=$customer['phone_number']?></td>
            <?php if ($_SESSION['role']== 'admin'):?>
            <td><a href = "<?=A_LINK['customer_list']."/".$i;?>">Voir</a></td>
            <?php endif ?>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>   
            </tbody>
        </table>
    </div>

    <div class = modif-customer-by-admin>

    </div>
<?php 
/*echo "<pre>";
echo (var_dump($customerList));
echo "</pre>";*/