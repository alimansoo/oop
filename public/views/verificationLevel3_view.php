<?php
use App\Classes\Errore;
?>
<section class="vh-100">
    <section class="content p1 d-flex justify-center">
        <section class="auth-box bg-white">
            <h5 class="auth-box_title">احراز هویت مرحله 3</h5>
            <form action="http://localhost/ElectronicShop/veriflevel3" role="form" method="post" enctype="multipart/form-data">
                <?php Errore::ShowErrore(); ?>
                <label for="firstName" class="">تاریخ تولد</label>
                <div class="form-outline mb-4">
                    <input type="date" class="form-controll" name="Birthday" id="Birthday">
                </div>
                <input type="submit" class="btn btn-primary block-btn" value="ثبت احراز هویت">
            </form>
        </section>
    </section>
</section>