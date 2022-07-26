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
                                <th>شناسه</th>
                                <th>تخفیف</th>
                                <th>پرداخت</th>
                                <th>وضعیت</th>
                                <th>مبلغ کل</th>
                                <th>گیرنده</th>
                                <th>تاریخ تحویل</th>
                                <th>تاریخ ثبت</th>
                                <th>هزینه ارسال</th>
                                <th>تغییرات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $payedStates = [
                                        1=>'<span class="badge badge-success">پرداخت شده</span>',
                                        0=>'<span class="badge badge-danger">پرداخت نشده</span>',
                                ];
                                $statusStates = [
                                        0=>'<span class="badge badge-dark">ثبت شده</span>',
                                        1=>'<span class="badge badge-info">درحال اماده سازی</span>',
                                        2=>'<span class="badge badge-success">تحویل داده شد</span>',
                                ];
                                foreach ($data as $value){
                                    echo '
                                        <tr>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["discount"].'%</td>
                                            <td>'.$payedStates[$value["IsPayed"]].'</td>
                                            <td>'.$statusStates[$value["status"]].'</td>
                                            <td>'.number_format($value["TotalPrice"]).'</td>
                                            <td>'.$value["reciverName"].'</td>
                                            <td>'.$value["reciverDate"].'</td>
                                            <td>'.$value["savedDate"].'</td>
                                            <td>'.number_format($value["transportPrice"]).'</td>
                                            <td>
                                                <a href="">حذف</a>/
                                                <a href="">ویرایش</a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>

                            <?php?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>شناسه</th>
                                <th>تخفیف</th>
                                <th>پرداخت</th>
                                <th>وضعیت</th>
                                <th>مبلغ کل</th>
                                <th>گیرنده</th>
                                <th>تاریخ تحویل</th>
                                <th>تاریخ ثبت</th>
                                <th>هزینه ارسال</th>
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