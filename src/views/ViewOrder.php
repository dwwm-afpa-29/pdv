<div class = listing>
    <div class = list>  

        <div class = "retour-listing"><a href = "<?=A_LINK ['admin_home']?>" class="Button38">Retour</a></div> 

        <div class = "table">
            <table class = "list_client">
            <thead>
                <tr>
                <th> Réf commande </th>
                <th> Prénom </th>
                <th> Nom </th>
                <th> Date </th>
                <th> Détail </th>
                </tr>
                
            </thead>
            <tbody>
                    
            <?php foreach($commandeList as $commande): ?>
                <tr class = "row">
                <td><?=$commande['id']?></td>
                <td><?=$commande['first_name']?></td>
                <td><?=$commande['last_name']?></td>  
                <td><?=$commande['date']?></td>
                <td><a href = "<?= A_LINK['ViewOrder'].'/'.$commande['id']?>">Voir</a>
                </tr>
            <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
    </div>

 



