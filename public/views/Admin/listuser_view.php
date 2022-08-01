<?php
use App\Classes\Pagination;
use App\Classes\Filter;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>کاربران</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">کاربران</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">کاربران</h3>
                    </div>
                    <form action="" class="p-3">
                        <label for="id">شناسه:</label>
                        <input type="number" name="id" id="id" value="<?php Filter::String('id'); ?>">
                        <label for="fname">نام:</label>
                        <input type="text" name="fname" id="fname" value="<?php Filter::String('fname'); ?>">
                        <label for="lname">فامیلی:</label>
                        <input type="text" name="lname" id="lname" value="<?php Filter::String('lname'); ?>">
                        <label for="email">ایمیل:</label>
                        <input type="email" name="email" id="email" value="<?php Filter::String('email'); ?>">
                        <label for="phone"> موبایل:</label>
                        <input type="number" name="phone" id="phone" value="<?php Filter::String('phone'); ?>">
                        <label for="active"> فعال:</label>
                        <input type="radio" name="active" id="active"  value="on" <?php Filter::RadioBtn('active','on'); ?>>
                        <label for="deactive"> غیر فعال:</label>
                        <input type="radio" name="active" id="deactive" value="off" <?php Filter::RadioBtn('active','off'); ?>>
                        <input type="submit" value="فیلتر">
                    </form>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> آواتار</th>
                                <th>شناسه</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>احراز هویت</th>
                                <th>نوع کاربر</th>
                                <th>فعال</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $verifStates = [
                                        0=>'<span class="badge badge-danger">انجام نشده</span>',
                                        1=>'<span class="badge badge-info">تایید ایمیل</span>',
                                        2=>'<span class="badge badge-warning">ارسال مدارک</span>',
                                        3=>'<span class="badge badge-success">تایید مدارک</span>',
                                        4=>'<span class="badge badge-primary">مرحله 3</span>',
                                ];
                                $activeStates = [
                                        0=>'<span class="badge badge-danger">غیر فعال</span>',
                                        1=>'<span class="badge badge-success">فعال</span>',
                                ];
                                $userTypes = [
                                        1=>'فروشنده',
                                        2=>'ادمین',
                                        3=>'مشتری',
                                ];
                                foreach ($data as $key=>$value){
                                    if ($key==='pageNumber')
                                        continue;
                                    if ($value['rejected']!==0)
                                        echo '<tr class="bg-danger">';
                                    else
                                        echo '<tr>';
                                    echo '
                                            <td><i class="fa-2x fa fa-user"></i></td>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["fname"].' '.$value['lname'].'</td>
                                            <td>'.$value["email"].'</td>
                                            <td>0'.$value["phone"].'</td>
                                            <td>'.$verifStates[$value["verifStatus"]];
                                    if ($value["verifStatus"] === 2 && $value['rejected']===0)
                                        echo '<a href="http://localhost/ElectronicShop/admin/verifuser/'.$value["email"].'" class="btn btn-primary">تایید کاربر</a>';
                                    echo '</td>
                                            <td>'.$userTypes[$value["usertypeId"]].'</td>
                                            <td><a href="http://localhost/ElectronicShop/admin/activeuser/'.$value["email"].'">'.$activeStates[$value['isActive']].'</a></td>
                                        </tr>
                                    ';
                                }
                            ?>

                            <?php?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th> آواتار</th>
                                <th>شناسه</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>احراز هویت</th>
                                <th>نوع کاربر</th>
                                <th>فعال</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="p-2">
                        صفحه بندی
                        <?php
                        Pagination::FooterPaginate(
                            $data
                        );
                        ?>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>