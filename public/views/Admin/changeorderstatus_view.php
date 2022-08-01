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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">تغییر وضعیت سفارش</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="http://localhost/ElectronicShop/admin/orderstate/<?php echo $data->id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="OrderStatus">وضعیت سفارش</label>
                                <select class="form-control" name="OrderStatus" id="OrderStatus">
                                    <option <?php if($data->status == 0) echo "selected"; ?> value="0">ثبت شده</option>
                                    <option <?php if($data->status == 1) echo "selected"; ?> value="1">درحال اماده سازی</option>
                                    <option <?php if($data->status == 2) echo "selected"; ?> value="2">تحویل داده شد</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> ثبت </button>
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>