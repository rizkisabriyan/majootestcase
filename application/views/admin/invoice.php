<div class="container-fluid">
    <h4>Invoice Product</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Order Date</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
        <?php foreach ($invoice as $ivc) : ?>
            <tr>
                <td><?= $ivc->ivc_id ?></td>
                <td><?= $ivc->ivc_nm ?></td>
                <td><?= $ivc->address ?></td>
                <td><?= $ivc->order_dt ?></td>
                <td><?= $ivc->lmt_tm_pay ?></td>
                <td><?= anchor('admin/invoice/detail/'.$ivc->ivc_id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>