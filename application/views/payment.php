<div class="container-fluid">
    <div class="row">
        <div class="col md-2"></div>
        <div class="col md-8">
            <div class="btn btn-sm btn-secondary">
                <?php
                $grand_total = 0 ;
                if ($cart =  $this->cart->contents())
                {
                    foreach ($cart as $item)
                    {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Your Bills is: RP. ".number_format($grand_total, 0,',','.');
                
                ?>
            </div>
            <br><br>

        <h3>Input Your Address </h3>
        <form method="post" action="<?= base_url('dashboard/order_process') ?>">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" placeholder="Type Your Name Here">
            </div>    
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" type="text" name="address" placeholder="Type Your Address Here">
            </div>    
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" type="text" name="phone" placeholder="Type Your Phone Number Here">
            </div>    
            <div class="form-group">
                <label>Delivery Service</label>
                <select class="form-control">
                    <option>Fedex</option>
                    <option>DHL</option>
                    <option>Amazon Logistic</option>
                    <option>DoorDash</option>
                    <option>Uber Eats</option>
                    <option>GrubHub</option>
                    <option>Wahana Xpress</option>
                    <option>Ninja Xpress</option>
                </select>
            </div>    
            <div class="form-group">
                <label>Bank Service</label>
                <select class="form-control">
                    <option>BCA - XXXXXXX</option>
                    <option>BNI - XXXXXXX</option>
                    <option>Mandiri - XXXXXXX</option>
                </select>
            </div>    
            <button type="submit" class="btn btn-sm btn-primary mb-4">Order Now</button>
        </form>
        <?php
                }
                else
                {
                    // echo "<h5>Your Cart Still Empty, Lets Go Shopping!";
                    // <?= anchor('dashboard/index/','<div class="btn btn-sm btn-danger">Back</div>')
                    echo anchor('dashboard/index/','<div class="btn btn-sm btn-secondary">Your Cart Still Empty, Lets Go Shopping!</div>');
                }
        ?>
        </div>
        <div class="col md-2"></div>
    </div>
</div>