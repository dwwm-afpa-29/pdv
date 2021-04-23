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
                <td><a href = "<?= A_LINK['admin_commande_to_do'].'/'.$commande['id']?>">Voir</a>
                </tr>
            <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
    </div>

    <?php if(isset($idCommande)):?>
        <div class = "detail-commande">
            <?php foreach($idCommande as $key): ?>
                <h1><?=$key['first_name']?> <?=$key['last_name']?></h1>
                <p>Numéro de commande : <?=$key['id']?></p>
                <p>Date de la commande : <?=$key['date']?></p>
                <?php break ;?>
            <?php endforeach?>
            <?php foreach($idCommande as $key): ?>
                <p>Type de produit : <?=$key['wording']?></p>
                <p>Référence produit : <?=$key['name']?></p>
                <p>Quantité : <?=$key['quantity']?></p>
                <p>Quantité : <?=$key['price']?></p>
            <?php endforeach?>
        </div>
    <?php endif?> 

</div>

 



