<?php
use App\Models\Addrss;
$address = new Addrss();
$AllAddress = $address->AllBy(
    ['UserId'=>$_SESSION['id']]
);
?>
<div class="container">
    <div class="cart">
        <div class="card-body">
            <h5 class="auth-box_title">ثبت سفارش</h5>
            <form action="http://localhost/ElectronicShop/order" method="post">
                <div class="mb-4">
                    <label for="reciverName" class="">نام گیرنده سفارش</label>
                    <br>
                    <input type="text" class="" name="reciverName" id="reciverName">
                </div>
                <div class=" mb-4">
                    <label for="resiverDate">تاریخ تحویل سفارش</label>
                    <br>
                    <select name="resiverDate" id="resiverDate">
                        <?php $datetime = new DateTime()?>
                        <option value="0"><?php echo $datetime->format('Y-m-d');?></option>
                        <?php $datetime->modify('+1 day');?>
                        <option value="1"><?php echo $datetime->format('Y-m-d');?></option>
                        <?php $datetime->modify('+1 day');?>
                        <option value="2"><?php echo $datetime->format('Y-m-d');?></option>
                    </select>
                </div>
                <div class=" mb-4">
                    <label for="Address">تاریخ تحویل سفارش</label>
                    <br>
                    <select name="Address" id="Address">
                        <?php
                        foreach ($AllAddress as $address){
                            $txtaddres = "شهر: ".$address['city'].",خیابان: ".$address['street'].",پلاک: ".$address['plate'];
                            echo "<option value='{$address['id']}'>$txtaddres</option>";
                        }
                        ?>
                    </select>
                </div>


                <input type="submit" class="btn btn-primary block-btn" value="ادامه">
            </form>
        </div>
    </div>
</div>