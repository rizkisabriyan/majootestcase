<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/slider2.jpg')?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('assets/img/slider4.jpg')?>" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row text-center mt-3">
        <?php foreach ($desktop as $dsk) : ?>
            <div class="card ml-3 mb-3" style="width: 16rem;">
            <img src="<?= base_url(). '/uploads/' .$dsk->picture?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title mb-1"><?= $dsk->prd_nm ?></h5>
              <small><?= $dsk->descriptions ?></small><br>
              <span class="badge badge-secondary mb-3">RP. <?= number_format($dsk->price, 0,',','.')?></span><br>
              <?= anchor('dashboard/add_cart/' .$dsk->prd_id,'<div class="btn btn-sm btn-primary">Add To Cart</div>')?>
              <?= anchor('dashboard/detail/' .$dsk->prd_id,'<div class="btn btn-sm btn-success">Detail</div>')?>
            </div>
          </div> 

        <?php endforeach; ?>
    </div>
</div>