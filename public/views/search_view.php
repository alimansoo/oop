<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center p-3" style="padding-bottom: 0;padding-top: 0;">
        <?php

        foreach ($data as $product){
            echo '
                <div class="col">
                    <div class="card">
                        <img src="'.$product['imgSrc'].'" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                        <div class="card-body">
                            <a href="http://localhost/ElectronicShop/product/'.$product['id'].'"><h5 class="card-title">'.$product['title'].'</h5></a>
                            <p class="card-text">
                                '.number_format($product['price']).' تومان
                            </p>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
    </div>
</div>
