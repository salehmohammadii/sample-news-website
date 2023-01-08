<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">ویرایش منو</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <form method="post" action="<?= url("admin/menue/update/".$parametrs['menue']['id']) ?>">

                <div class="form-group">
                    <label for="name">عنوان</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="عنوان را وارد کنید"
                           value="<?= $parametrs['menue']['name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="url">لینک</label>
                    <input type="text" class="form-control" id="url" name="url"
                           placeholder="لینک را وارد کنید"
                           value="<?= $parametrs['menue']['url'] ?>" required>
                </div>


                <button type="submit" class="btn btn-primary btn-sm">ویرایش</button>
            </form>
        </section>
    </section>



</main>
