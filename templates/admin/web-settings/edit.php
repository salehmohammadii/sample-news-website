<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">ویرایش تنظیمات</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="<?= url("admin/web_settings/update") ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">عنوان سایت</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان را وارد کنید" value="<?= $parametrs['title'] ?>" autofocus>
                </div>

                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="توضیحات را وارد کنید..." value="<?= $parametrs['description'] ?>" autofocus>
                </div>

                <div class="form-group">
                    <label for="keywords">کلمات کلیدی</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="کلمات کلیدی را وارد کنید..." value="<?= $parametrs['keywords'] ?>" autofocus>
                </div>

                <div class="form-group">
                    <label for="phone">شماره تماس</label>
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="شماره تماس را وارد کنید" value="<?= $parametrs['phone'] ?>" autofocus>
                </div>

                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل را وارد کنید..." value="<?= $parametrs['email'] ?>" autofocus>
                </div>


                <div class="form-group">

                    <img style="width: 100px;" src="<?= assets($parametrs['logo']) ?>" alt="">
                    <hr/>

                    <label for="logo">لوگو</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
                </div>

                <div class="form-group">

                    <img style="width: 100px;" src="<?= assets($parametrs['icon']) ?>" alt="">
                    <hr/>

                    <label for="icon">آیکون</label>
                    <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">ذخیره</button>
            </form>
        </section>
    </section>
</main>