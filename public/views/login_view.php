<?php
use App\Classes\Errore;
?>
<section class="vh-100">

    <section class="content p1 d-flex justify-center">
        <section class="auth-box bg-white">
            <h5 class="auth-box_title">ورود به کالاچیو</h5>
            <form action="http://localhost/ElectronicShop/login" method="post">
                <?php Errore::ShowErrore(); ?>
                <label for="email" class="">ایمیل</label><br>
                <div class="form-outline mb-4">
                    <input type="email" class="form-controll" name="email" id="email">
                </div>
                <label for="password" class="">رمز عبوز</label><br>
                <div class="form-outline mb-4">
                    <input type="password" class="form-controll" name="password" id="password">
                </div>
                <input type="submit" class="btn btn-primary block-btn" value="ادامه">
            </form>
            <a href="http://localhost/ElectronicShop/register" class="btn btn-primary block-btn">ثبت نام</a>
        </section>
    </section>
</section>