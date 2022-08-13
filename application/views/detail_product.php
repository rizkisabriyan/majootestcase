<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <?php foreach($product as $prd): ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url().'/uploads/'.$prd->picture?>" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Product Name</td>
                            <td><strong><?= $prd->prd_nm ?></strong></td>
                        </tr>
                        <tr>
                            <td>Descriptions</td>
                            <td><strong><?= $prd->descriptions ?></strong></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><strong><?= $prd->category ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><strong><?= $prd->stock ?></strong></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><strong><div class="btn btn-sm btn-secondary">Rp. <?= number_format($prd->price, 0,',','.')?></div></strong></td>
                            <!-- <td><strong><?= $prd->price ?></strong></td> -->
                        </tr>
                    </table>
                    <?= anchor('dashboard/add_cart/' .$prd->prd_id,'<div class="btn btn-sm btn-primary">Add To Cart</div>')?>
                    <?= anchor('dashboard/index/','<div class="btn btn-sm btn-danger">Back</div>')?>
                </div>
            </div>   
            <?php endforeach; ?>
        </div>
    </div>



</div>