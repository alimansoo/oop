<?php
use App\Classes\Authentication;
?>
<div class="container" style="min-height: 50vh;margin-top: 50px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">نام</th>
            <th scope="col">فامیل</th>
            <th scope="col">ایمیل</th>
            <th scope="col">موبایل</th>
            <th scope="col">تاریخ تولد</th>
        </tr>
        </thead>
        <tbody class="table-group-divider table-divider-color">
        <?php
        $maxBuy = [
            1=>0,
            2=>0,
            3=>5000000,
            4=>30000000,
        ];
        echo "<tr>
            <th>{$data->fname}</th>
            <td>{$data->lname}</td>
            <td>{$data->email}</td>
            <td>0{$data->phone}</td>
            <td>{$data->Birthday}</td>
        </tr>";
        ?>

        <tr>

            <th scope="row"><?php echo Authentication::NextLevel($data->verifStatus);?></th>
            <td>
                حداکثر خرید شما:

            </td>
            <td> <?php echo number_format(Authentication::MaxBuy($data->verifStatus));?>تومان  </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td colspan="2"></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
