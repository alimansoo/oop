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
                        <h3 class="card-title mb-4">کاربران</h3>
                        <a href="http://localhost/ElectronicShop/admin/addproduct" class="btn btn-primary">اضافه کردن محصول</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>شناسه</th>
                                <th>عنوان محصول</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>
                                <th>تغییرات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $categorys = [
                                    1=>'لپ تاب',
                                    2=>'موبایل',
                                    3=>'ساعت هوشمند',
                                    4=>'تبلت'
                            ];
                            foreach ($data as $value){
                                echo '
                                        <tr>
                                            <td><img width="50px" src="'.$value["imgSrc"].'"/></td>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["title"].'</td>
                                            <td> '.number_format($value["price"]).'تومان </td> 
                                            <td>'.$categorys[$value["categoryId"]].'</td>
                                            <td>
                                            <a href="http://localhost/ElectronicShop/admin/delproduct/'.$value["id"].'">حذف</a>
                                            /<a href="http://localhost/ElectronicShop/admin/editproduct/'.$value["id"].'">ویرایش</a>
</td>
                                        </tr>
                                    ';
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>تصویر</th>
                                <th>شناسه</th>
                                <th>عنوان محصول</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>
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