<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addprd"><i class="fas fa-plus fa-sm"></i>Add Product</button>
    <table class="table table-bordered">
        <tr>
            <th>ID Product</th>
            <th>Product Name</th>
            <th>Descriptions</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th colspan="3">Action</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($product as $prd) :?>
        <tr>
            <td><?php echo $no++?>              </td>
            <td><?php echo $prd->prd_nm ?>      </td>
            <td><?php echo $prd->descriptions ?></td>
            <td><?php echo $prd->category ?>    </td>
            <td><?php echo $prd->price ?>       </td>
            <td><?php echo $prd->stock ?>       </td>
            <td><div class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i></div></td>
            <td><?= anchor('admin/product_list/edit/' .$prd->prd_id,'<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>')?></td>
            <td><?= anchor('admin/product_list/delete/' .$prd->prd_id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
        </tr>

        <?php endforeach; ?>


    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="addprd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url(). 'admin/product_list/add_action'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="prd_nm" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descriptions</label>
                    <input type="text" name="descriptions" class="form-control">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <!-- <input type="text" name="category" class="form-control"> -->
                    <select class="form-control" name="category">
                      <option>standart</option>
                      <option>lifestyle</option>
                      <option>desktop</option>
                      <option>advance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" name="stock" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product picture</label>
                    <input type="file" name="picture" class="form-control">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>