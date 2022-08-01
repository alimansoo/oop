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
                <?php
                if ($data->qty<=0){
                    echo '<div class="alert alert-danger">موجود نیست!!</div>';
                }else{
                    $discountPrice = 0;
                    if ($data->discount!==0){
                        echo '<span style="text-decoration: line-through;">'.number_format($data->price).'</span>'.'تومان';
                        $discountPrice = ($data->price/100)*$data->discount ;
                        echo ' <span class="badge btn-primary">'.$data->discount.'%</span> ';
                    }
                    echo number_format($data->price - $discountPrice);
                    echo 'تومان';
                    if (isset($_SESSION['email'])){
                        echo '   
                       <div>
                            <a class="btn btn-primary" style="direction: ltr;" href="http://localhost/ElectronicShop/cart/'.$data->id.'" role="button">
                                <i class="fas fas fa-shopping-cart"></i>
                                افزودن به سبد
                            </a>
                       </div>
                    ';
                    }
                }
                ?>
            </div>


        </div>
    </div>
</div>