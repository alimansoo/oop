<?php
use App\Classes\Errore;
$maxBuy = [
    1=>0,
    2=>0,
    3=>5000000,
    4=>30000000,
];
$user = new \App\models\User($_SESSION['email']);
?>
<section class="h-100" style="background-color: #eee;min-height: 50vh;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">سبد خرید</h3>
                    <?php Errore::ShowErrore(); ?>
                    <div>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                    class="fas fa-angle-down mt-1"></i></a></p>
                    </div>
                </div>

                <?php
                    if (count($data)<1){
                        echo '
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        محصولی در سبد خرید وجود ندارد
                                    </div>
                                </div>
                            </div>';
                    }else{
                        $totalPrice = 0;
                        foreach ($data as $product){
                            $discountPrice = 0;
                            if ($product->discount!==0){
                                $discountPrice = ($product->price/100)*$product->discount;
                            }
                            $totalPrice += (($product->price-$discountPrice)*$product->qty);
                            echo '
                                <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img
                                                    src="'.$product->imgSrc.'"
                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2">'.$product->title.'</p>
                                                <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <a href="http://localhost/ElectronicShop/inccart/'.$product->orderid.'" style="width: 50px;text-align: center;">
                                                    +
                                                </a>
                
                                                <div id="form1" min="0" name="quantity" style="width: 50px" class="form-control form-control-sm" >'.$product->cartqty.'</div>
                
                                                <a href="http://localhost/ElectronicShop/deccart/'.$product->orderid.'" style="width: 50px;text-align: center;">
                                                    -
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0">'.number_format($product->price - $discountPrice).'تومان</h5> 
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="http://localhost/ElectronicShop/delcart/'.$product->orderid.'" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                ';
                        }
                        echo '
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5>جمع کل سبد :</h5>'.number_format($totalPrice).' تومان
                                </div>
                            </div>';
                        echo '<div class="card mb-4">
                                    <div class="card-body">';
                        if ($maxBuy[$user->verifStatus] < $totalPrice) {
                            echo '<div class="alert alert-danger">کاربر گرامی شما بیشتر از حد مجاز در سبد خود دارید برای ثبت این خرید باید احراز هویت مرحله بعد را در پنل خود انجام دهید.</div>';
                        }else{
                                echo '
                                        <a href="http://localhost/ElectronicShop/order" class="btn btn-warning btn-block btn-lg">ادامه سبد خرید</a>
                                    ';
                        }
                        echo '</div>
                                </div>';
                    }
                ?>



            </div>
        </div>
    </div>
</section>