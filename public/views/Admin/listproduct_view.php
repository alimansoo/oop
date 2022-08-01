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
                        <h3 class="card-title mb-4">محصولات</h3>
                        <a href="http://localhost/ElectronicShop/admin/addproduct" class="btn btn-primary">اضافه کردن محصول</a>
                    </div>
                    <form action="" class="p-3">
                        <label for="id">شناسه:</label>
                        <input type="number" name="id" id="id" value="<?php Filter::String('id'); ?>">
                        <label for="name">نام:</label>
                        <input type="text" name="name" id="name" value="<?php Filter::String('name'); ?>">
                        <label for="ofPrice">قیمت از:</label>
                        <input type="number" name="ofPrice" id="ofPrice" value="<?php Filter::String('ofPrice'); ?>">
                        <label for="toPrice">قیمت تا:</label>
                        <input type="number" name="toPrice" id="toPrice" value="<?php Filter::String('toPrice'); ?>">
                        <label for="discount"> تخفیف دار:</label>
                        <input type="checkbox" name="discount" id="discount" <?php Filter::Checkbox('discount'); ?>>
                        <input type="submit" value="فیلتر">
                    </form>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>شناسه</th>
                                <th>عنوان محصول</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>
                                <th>تعداد</th>
                                <th>تخفیف</th>
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
                            foreach ($data as $key =>$value){
                                if ($key==='pageNumber')
                                    continue;
                                if ($value['qty']<=0)
                                    echo '<tr style="background-color: #93a1a1">';
                                else if ($value['discount']!==0)
                                    echo '<tr style="background-color: #89E6C4">';
                                else
                                    echo '<tr>';
                                echo '
                                            <td><img width="50px" src="'.$value["imgSrc"].'"/></td>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["title"].'</td>
                                            <td> '.number_format($value["price"]).'تومان </td> 
                                            <td>'.$categorys[$value["categoryId"]].'</td>
                                            <td>'.$value["qty"].'</td>
                                            <td>'.$value["discount"].'%</td>
                                            <td>
                                                <a href="http://localhost/ElectronicShop/admin/discount/'.$value["id"].'">اعمال تخفیف</a>
                                            </td>
                                            <td>
                                                <a href="http://localhost/ElectronicShop/admin/delproduct/'.$value["id"].'">حذف</a>
                                                / <a href="http://localhost/ElectronicShop/admin/editproduct/'.$value["id"].'">ویرایش</a>
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
                                <th>تعداد</th>
                                <th>تخفیف</th>
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

            </div>

        </div>

    </section>
    <!-- /.content -->
</div>