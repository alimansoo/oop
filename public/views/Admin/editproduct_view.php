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
                        <h3 class="card-title">ویرایش محصول</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="http://localhost/ElectronicShop/admin/editproduct/<?php echo $data->id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ProductTitle">اسم محصول</label>
                                <input type="text" value="<?php echo $data->title;?>" name="ProductTitle" id="ProductTitle" class="form-control" placeholder="اسم محصول را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="ProductPrice">قیمت محصول</label>
                                <div class="input-group">
                                    <input type="text" value="<?php echo $data->price;?>" name="ProductPrice" id="ProductPrice" class="form-control" id="" placeholder="قیمت محصول را وارد کنید">
                                    <div class="input-group-append">
                                        <span class="input-group-text">ریال</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="ProductCategory">دسته بندی</label>
                                <label>انتخاب کنید</label>
                                <select class="form-control" name="ProductCategory" id="ProductCategory">
                                    <option <?php if ($data->categoryId === 1) echo "selected"?> value="1">لپ تاب</option>
                                    <option <?php if ($data->categoryId === 2) echo "selected"?> value="2">موبایل</option>
                                    <option <?php if ($data->categoryId === 3) echo "selected"?> value="3">ساعت هوشمند</option>
                                    <option <?php if ($data->categoryId === 4) echo "selected"?> value="4">تبلت</option>
                                </select>
                            </div>
                            <img src="<?php echo $data->imgSrc;?>" width="50px">
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
                            <button type="submit" class="btn btn-primary">ویرایش</button>
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