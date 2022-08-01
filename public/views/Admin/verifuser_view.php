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
                        <h3 class="card-title">تایید کاربر</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="http://localhost/ElectronicShop/admin/verifuser/<?php echo $data->email;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ProductTitle">نام کاربر</label>
                                <input type="text" value="<?php echo $data->fname;?>" readonly name="ProductTitle" id="ProductTitle" class="form-control" placeholder="اسم محصول را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="ProductTitle">فامیل کاربر</label>
                                <input type="text" value="<?php echo $data->lname;?>" readonly name="ProductTitle" id="ProductTitle" class="form-control" placeholder="اسم محصول را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="ProductTitle">ایمیل کاربر</label>
                                <input type="text" value="<?php echo $data->email;?>" readonly name="ProductTitle" id="ProductTitle" class="form-control" placeholder="اسم محصول را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="ProductTitle">شماره همراه کاربر</label>
                                <input type="text" value="0<?php echo $data->phone;?>" readonly name="ProductTitle" id="ProductTitle" class="form-control" placeholder="اسم محصول را وارد کنید" readonly>
                            </div>
                            <div class="form-group">
                                <label for="ProductTitle">کارت ملی کاربر کاربر</label>
                                <br>
                                <img width="500px" src="<?php echo 'http://localhost/ElectronicShop/public/img/nationalcards/'.$data->nationalCartIMG;?>" alt="">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">تایید کاربر </button>
                            <a href="http://localhost/ElectronicShop/admin/rejectuser/<?php echo $data->email;?>" class="btn btn-danger">مسدود کردن کاربر</a>
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