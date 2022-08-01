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
                        <h3 class="card-title">تخفیف محصول</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="http://localhost/ElectronicShop/admin/discount/<?php echo $data->id; ?>" role="form" method="post" enctype="multipart/form-data">

                        <div class="card-body">
                            <img width="200px" src="<?php echo $data->imgSrc; ?>" alt="">
                            <br>
                            <br>
                            <h5><?php echo $data->title; ?></h5>
                            <br>
                            <h6><?php echo number_format($data->price); ?>ریال</h6>
                            <br>
                            <div class="form-group">
                                <label for="discount">تخفیف محصول</label>
                                <div class="input-group">
                                    <input type="number" value="<?php echo $data->discount; ?>" name="discount" id="discount" class="form-control" max="100" placeholder="تخفیف">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">اعمال تخفیف</button>
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