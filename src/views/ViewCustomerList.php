<div class = listing>
    <div class = list>     
        <table class = "list_client">
        <thead>
            <tr>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Email </th>
            <th> Téléphone </th>
            <th> Modifier </th>
            </tr>
            
        </thead>
        <tbody>
                
        <?php foreach($customerList as $customerS): ?>
            <tr class = "row">
            <td><?=$customerS['last_name']?></td>
            <td><?=$customerS['first_name']?></td>
            <td><?=$customerS['mail']?></td>  
            <td><?=$customerS['phone_number']?></td>
            <?php if ($_SESSION['role']== 'admin'):?>
            <td><a href = "<?=A_LINK['customer_list_modif']."/".$customerS['id'];?>">Voir</a></td>
            <?php endif ?>
            </tr>
        <?php endforeach; ?>   
            </tbody>
        </table>
    </div>

    <div class = modif-customer-by-admin>
    <?php /*foreach($customer as $custo){
        echo $custo['last_name'];

    }*/
    ?>
    </div>
<?php 



/*echo "<pre>";
echo (var_dump($customerList));
echo "</pre>";*/