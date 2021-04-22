
<div class = listing>
    <div class = "list">  

        <div class = "retour-listing"><a href = "<?=A_LINK ['admin_home']?>" class="Button38">Retour</a></div> 

        <table class = "list_client">
        <thead>
            <tr>
            <th> Nom </th>
            <th> Type </th>
            <th> Degrés </th>
            <th> Prix </th>
            <th> visibilité </th>
            <th> Stock </th>
            </tr>
            
        </thead>
        <tbody>
                
        <?php foreach($allArticles as $article){?>
            <tr class = "row">
            <td><?=$article->getName()?></td>
            <td><?=$article->getProdType()->getWording()?></td>
            <td><?=$article->getDegre()?></td>
            <td><?=$article->getPrice()?></td>
            <?php $visi = ($article->getVisible()==0)?"non":"oui"; ?>
            <td> <?= $visi ?></td>
            <td><?=$article->getStock()?></td>
            <td>modifier</td>
            </tr>
        <?php } ?>   
            </tbody>
        </table>
    </div>