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
                                <th>#</th>
                                <th>دسترسی ادمین</th>
                                <th>اضافه کردن محصول</th>
                                <th>حذف محصول</th>
                                <th>ویرایش محصول</th>
                                <th>اضافه کاربر</th>
                                <th>حذف کاربر</th>
                                <th>ویرایش کاربر</th>
                                <th>اضافه دسته بندی</th>
                                <th>حذف دسته بندی</th>
                                <th>تغییر دسترسی ها</th>
                                <th>تغییرات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $boolTypes = [
                                0=>'<span class="badge badge-danger">انجام نشده</span>',
                                1=>'<span class="badge badge-warning">ارسال مدارک</span>'
                            ];
                            foreach ($data as $value){
                                echo '
                                        <tr>
                                            <td><i class="fa-2x fa fa-user"></i></td>
                                            <td>'.$value["title"].'</td>
                                            <td>'.$value["AdminPanel"].'</td>
                                            <td>'.$value["addproduct"].'</td>
                                            <td>'.$value["delproduct"].'</td>
                                            <td>'.$value["editproduct"].'</td>
                                            <td>'.$value["adduser"].'</td>
                                            <td>'.$value["deluser"].'</td>
                                            <td>'.$value["edituser"].'</td>
                                            <td>'.$value["addcategory"].'</td>
                                            <td>'.$value["delcategory"].'</td>
                                            <td>'.$value["changepermition"].'</td>
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
                                <th>#</th>
                                <th>دسترسی ادمین</th>
                                <th>اضافه کردن محصول</th>
                                <th>حذف محصول</th>
                                <th>ویرایش محصول</th>
                                <th>اضافه کاربر</th>
                                <th>حذف کاربر</th>
                                <th>ویرایش کاربر</th>
                                <th>اضافه دسته بندی</th>
                                <th>حذف دسته بندی</th>
                                <th>تغییر دسترسی ها</th>
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