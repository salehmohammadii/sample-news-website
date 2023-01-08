<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">ویرایش دسته بندی</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="<?= url("admin/category/update/".$parametrs['id']) ?>">
                <div class="form-group">
                    <label for="name">عنوان</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="عنوان را وارد کنید" value="<?= $parametrs['name'] ?>">
                    <!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
                <button type="submit" class="btn btn-primary btn-sm">ویرایش</button>
            </form>
        </section>
    </section>


</main>