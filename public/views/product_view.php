<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center p-3">
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <img
                    src="<?php echo $data->imgSrc;?>"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
            />
        </div>
        <div>
            <h1 class="display-6"><?php echo $data->title;?></h1>
        </div>

        <div>
            <div>
                <?php echo number_format($data->price);?>
                تومان
            </div
            <div>
                <a class="btn btn-primary" style="direction: ltr;" href="http://localhost/ElectronicShop/cart/<?php echo $data->id;?>" role="button">
                    <i class="fas fas fa-shopping-cart"></i>
                    افزودن به سبد
                </a>
            </div>

        </div>
    </div>
</div>