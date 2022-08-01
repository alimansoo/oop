<?php
use App\Classes\Errore;
?>
<section class="vh-100">
    <section class="content p1 d-flex justify-center">
        <section class="auth-box bg-white">
            <h5 class="auth-box_title">احراز هویت مرحله 2</h5>
            <form action="http://localhost/ElectronicShop/veriflevel2" role="form" method="post" enctype="multipart/form-data">
                <?php Errore::ShowErrore(); ?>
                <label for="firstName" class="">نام</label>
                <div class="form-outline mb-4">
                    <input type="text" class="form-controll" name="firstName" id="firstName">
                </div>
                <label for="lastName" class="">نام خوانوادگی</label>
                <div class="form-outline mb-4">
                    <input type="text" class="form-controll" name="lastName" id="lastName">

                </div>
                <label for="NationalCartImg" class="">عکس کارت ملی</label>
                <div class="form-outline mb-4">
                    <input type="file" class="form-controll" name="NationalCartImg" id="NationalCartImg">
                </div>
                <input type="submit" class="btn btn-primary block-btn" value="ثبت احراز هویت">
            </form>
        </section>
    </section>
</section>