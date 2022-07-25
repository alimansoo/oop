<div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-4 justify-content-center p-3">
            <?php

            foreach ($data as $category){
                echo '
                <div class="col">
                    <div class="card h-100">
                        <img src="'.$category['ImgSrc'].'" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                        <div class="card-body text-center">
                            <a href="http://localhost/ElectronicShop/search?category='.$category['Name'].'"><h5 class="card-title">'.$category['persianName'].'</h5></a>
                        </div>
                    </div>
                </div>
            ';
            }
            ?>
    </div>
</div>
