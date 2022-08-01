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
                    <h1>دسته بندی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">محصولات</a></li>
                        <li class="breadcrumb-item active">دسته بندی</li>
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
                        <h3 class="card-title">دسته بندی</h3>
                    </div>
                    <form action="" class="p-3">
                        <label for="id">شناسه:</label>
                        <input type="number" name="id" id="id" value="<?php Filter::String('id'); ?>">
                        <label for="name">نام:</label>
                        <input type="text" name="name" id="name" value="<?php Filter::String('name'); ?>">
                        <label for="persianName">نام فارسی:</label>
                        <input type="text" name="persianName" id="persianName" value="<?php Filter::String('persianName'); ?>">
                        <input type="submit" value="فیلتر">
                    </form>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>شناسه</th>
                                <th>نام</th>
                                <th>نام فارسی</th>
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
                                foreach ($data as $key=>$value){
                                    if ($key === 'pageNumber')
                                        continue;
                                    echo '
                                        <tr>
                                            <td><img width="50px" src="'.$value["ImgSrc"].'"/></td>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["Name"].'</td>
                                            <td>'.$value["persianName"].'</td>
                                            <td>ویرایش/حذف</td>
                                        </tr>
                                    ';
                                }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>تصویر</th>
                                <th>شناسه</th>
                                <th>نام</th>
                                <th>نام فارسی</th>
                                <th>تغییرات</th>
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>