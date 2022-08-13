<div class="container-fluid">
    <h4>Detail Invoice <div class="btn btn-sm btn-success">No. Invoice: <?= $invoice->ivc_id  ?></div></h4>
    <table class="table table bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Quantity Orders</th>
            <th>Price Per Item</th>
            <th>Sub Total</th>
        </tr>

        <?php $total = 0; foreach($orders as $ord) : $subtotal = $ord->qty * $ord->price ;
                                                     $total += $subtotal;
        ?>

        <tr>
            <td><?= $ord->prd_id?></td>
            <td><?= $ord->prd_nm?></td>
            <td><?= $ord->qty?></td>
            <td>Rp. <?= number_format($ord->price, 0,',','.') ?></td>            
            <td>Rp. <?= number_format($subtotal, 0,',','.') ?></td>            
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?= number_format($total, 0,',','.') ?></td>   
        </tr>
    </table>
    <a href="<?= base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">back</div></a>
</div>