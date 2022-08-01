<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center p-3" style="padding-bottom: 0;padding-top: 0;">
        <?php

        foreach ($data as $product){
            $discountPrice = 0;
            echo '
                <div class="col">
                    <div class="card">
                        <img src="'.$product['imgSrc'].'" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                        <div class="card-body">
                            <a href="http://localhost/ElectronicShop/product/'.$product['id'].'"><h5 class="card-title">'.$product['title'].'</h5></a>';

            if ($product['qty']<=0){
                echo '<p class="card-text text-danger">
                                    موجود نیست!!!
                                </p>
                            </div>
                        </div>
                    </div>
                ';
            }else{
                if ($product['discount']!==0){
                    echo '<span style="text-decoration: line-through;">'.number_format($product['price']).'</span>'.'تومان';
                    $discountPrice = ($product['price']/100)*$product['discount'] ;
                    echo ' <span class="badge btn-primary">'.$product['discount'].'%</span> ';
                }
                echo '<p class="card-text">
                                    '.number_format($product['price'] - $discountPrice).' تومان
                                </p>
                            </div>
                        </div>
                    </div>
                ';
            }
        }
        ?>
    </div>
</div>
