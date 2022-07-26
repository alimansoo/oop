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
                        <h3 class="card-title">محصول جدید</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="http://localhost/ElectronicShop/admin/addproduct" role="form" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ProductTitle">اسم محصول</label>
                                <input type="text" name="ProductTitle" id="ProductTitle" class="form-control" placeholder="اسم محصول را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="ProductPrice">قیمت محصول</label>
                                <div class="input-group">
                                    <input type="text" name="ProductPrice" id="ProductPrice" class="form-control" id="" placeholder="قیمت محصول را وارد کنید">
                                    <div class="input-group-append">
                                        <span class="input-group-text">ریال</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="ProductCategory">دسته بندی</label>
                                <label>انتخاب کنید</label>
                                <select class="form-control" name="ProductCategory" id="ProductCategory">
                                    <option value="1">لپ تاب</option>
                                    <option value="2">موبایل</option>
                                    <option value="3">ساعت هوشمند</option>
                                    <option value="4">تبلت</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ProductImage">تصویر محصول</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="ProductImage" id="ProductImage">
                                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">اضافه کردن</button>
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