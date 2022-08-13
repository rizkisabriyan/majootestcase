<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Product</h3>

    <?php foreach ($product as $prd) : ?>
        <form method="post" action="<?=  base_url().'admin/product_list/update' ?>">
            <div class="for-group">
                <label>Product name</label>
                <input type="text" name="prd_nm" class="form-control" value="<?= $prd->prd_nm ?>">
            </div>
            <div class="for-group">
                <label>Descriptions</label>
                <input type="hidden" name="prd_id" class="form-control" value="<?= $prd->prd_id ?>">
                <input type="text" name="descriptions" class="form-control" value="<?= $prd->descriptions ?>">
            </div>
            <div class="for-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control" value="<?= $prd->category ?>">
            </div>
            <div class="for-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?= $prd->price ?>">
            </div>
            <div class="for-group">
                <label>Stock</label>
                <input type="text" name="stock" class="form-control" value="<?= $prd->stock ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>
    <?php endforeach; ?>
</div>