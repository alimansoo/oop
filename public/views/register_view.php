<?php
use App\Classes\Errore;
?>
<section class="vh-100">
    <section class="content p1 d-flex justify-center">
        <section class="auth-box bg-white">
            <h5 class="auth-box_title">ثبت نام در الکترونیک شاپ</h5>
            <form action="http://localhost/ElectronicShop/register" method="post">
                <?php Errore::ShowErrore(); ?>
                <label for="email" class="">ایمیل</label>
                <div class="form-outline mb-4">
                    <input type="email" class="form-controll" name="email" id="email">

                </div>
                <label for="phone" class="">شماره موبایل</label>
                <div class="form-outline mb-4">
                    <input type="number" class="form-controll" name="phone" id="phone">

                </div>
                <label for="password" class="">رمز عبور</label>
                <div class="form-outline mb-4">
                    <input type="password" class="form-controll" name="password" id="password">

                </div>
                <input type="submit" class="btn btn-primary block-btn" value="ثبت نام">
            </form>
        </section>
    </section>
</section>