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
                    <h1>سفارشات</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">سفارشات</a></li>
                        <li class="breadcrumb-item active">لیست سفارشات</li>
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
                        <h3 class="card-title">سفارشات</h3>
                    </div>
                    <form action="" class="p-3">
                        <label for="id">شناسه:</label>
                        <input type="number" name="id" id="id" value="<?php Filter::String('id'); ?>">
                        <label for="status">وضیت:</label>
                        <select name="status" id="status">
                            <option value="" selected>انتخاب کنید</option>
                            <option value="0" <?php Filter::Combobox('status','0'); ?>>ثبت شده</option>
                            <option value="1" <?php Filter::Combobox('status','1'); ?>>درحال اماده سازی</option>
                            <option value="2" <?php Filter::Combobox('status','2'); ?>>تحویل شده</option>
                        </select>
                        <label for="savedDateof">ثبت سفارش از:</label>
                        <input type="date" name="savedDateof" id="savedDateof" value="<?php Filter::String('savedDateof'); ?>">
                        <label for="savedDateto">ثبت سفارش تا:</label>
                        <input type="date" name="savedDateto" id="savedDateto" value="<?php Filter::String('savedDateto'); ?>">
                        <label for="reciverDateof"> دریافت سفارش از:</label>
                        <input type="date" name="reciverDateof" id="reciverDateof" value="<?php Filter::String('reciverDateof'); ?>">
                        <label for="reciverDateto">دریافت سفارش تا:</label>
                        <input type="date" name="reciverDateto" id="reciverDateto" value="<?php Filter::String('reciverDateto'); ?>">
                        <label for="ispayedon"> پرداخت شده:</label>
                        <input type="radio" name="ispayed" id="ispayedon"  value="on" <?php Filter::RadioBtn('ispayed','on'); ?>>
                        <label for="ispayedoff">  پرداخت نشده:</label>
                        <input type="radio" name="ispayed" id="ispayedoff" value="off" <?php Filter::RadioBtn('ispayed','off'); ?>>
                        <input type="submit" value="فیلتر">
                    </form>
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
                                foreach ($data as $key=>$value){
                                    if ($key === 'pageNumber')
                                        continue;
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
                                                <a href="http://localhost/ElectronicShop/admin/orderstate/'.$value["id"].'">تغییر وضعیت</a>
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