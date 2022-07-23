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
                    <!-- /.card-header -->
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
                                <th>فعال</th>
                                <th>تغییرات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $verifStates = [
                                        0=>'<span class="badge badge-danger">انجام نشده</span>',
                                        1=>'<span class="badge badge-warning">ارسال مدارک</span>',
                                        2=>'<span class="badge badge-success">تایید مدارک</span>',
                                ];

                                $activeStates = [
                                        0=>'<span class="badge badge-danger">غیر فعال</span>',
                                        1=>'<span class="badge badge-success">فعال</span>',
                                ];
                                foreach ($data as $value){
                                    echo '
                                        <tr>
                                            <td><i class="fa-2x fa fa-user"></i></td>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["fname"].' '.$value['lname'].'</td>
                                            <td>'.$value["email"].'</td>
                                            <td>'.$value["phone"].'</td>
                                            <td>'.$verifStates[$value["verifStatus"]].'</td>
                                            <td>'.$activeStates[$value['isActive']].'</td>
                                            <td>ویرایش/حذف</td>
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
                                <th>فعال</th>
                                <th>تغییرات</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>