<h1>Historique de commande</h1>

<?php if(empty($allDates)) : ?>
    <p>Vous n'avez effectué aucune commande</p>
<?php else : ?>
    <div>
        <table>
            <tr>
                <th>N° de commande</th>
                <th>Date</th>
                <th colspan="2">Montant total</th>
            </tr>
            <?php foreach($allDates as $date) : ?>
                <tr>
                    <td><?= $date['id']; ?></td>
                    <td><?= date('d/m/Y', strtotime($date['date'])); ?></td>
                    <td><?= number_format($date['total'], 2); ?>&euro;</td>
                    <td><a href="<?= A_LINK['customer_historical'] . '/' .  $date['id'];?>">Voir la commande</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <div>

    <div>
        <?php if(!empty($detailCommande)) : ?>
            <table>
                <tr>
                    <th>Articles</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
                <?php foreach($detailCommande as $detail) : ?>
                    <tr>
                        <td><?= $detail['name']; ?></td>
                        <td><?= number_format($detail['pu'], 2); ?>&euro;</td>
                        <td><?= $detail['quantity']; ?></td>
                        <td><?= number_format($detail['total'], 2); ?>&euro;</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
<?php endif; ?>