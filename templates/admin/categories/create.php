
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">ساخت دسته بندی جدید</h1>
    </section>
    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="<?= url("admin/category/store") ?>">
                <div class="form-group">
                    <label for="name">نوان</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="عنوان را وارد کنید">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">ذخیره</button>
            </form>
        </section>
</main>
