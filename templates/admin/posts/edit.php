<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">ویرایش پست</h1>
    </section>
    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="<?= url("admin/post/update/".$parametrs['posts']['id']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title"
                           placeholder="عنوان را وارد کنید."
                           value="<?= $parametrs['posts']['title'] ?>">
                </div>

                <div class="form-group">
                    <label for="cat_id">دسته بندی</label>
                    <select name="cat_id" id="cat_id" class="form-control" required autofocus>
                        <?php foreach ($parametrs['category'] as $category){?>
                            <option value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <img style="width: 100px;" src="" alt="">
                    <hr/>
                    <label for="image">تصویر</label>
                    <img style="width: 80px;" src="<?= assets($parametrs['posts']['image']) ?>" alt="">
                    <input type="file" id="image" name="image" class="form-control-file" autofocus>
                </div>



                <div class="form-group">
                    <label for="summary">خلاصه</label>
                    <textarea class="form-control" id="summary" name="summary"
                              placeholder="خلاصه ..." rows="3"><?= $parametrs['posts']['summary'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="body">متن</label>
                    <textarea class="form-control" id="body" name="body" placeholder="متن" rows="5">
                        <?= $parametrs['posts']['body'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">ویرایش</button>
            </form>
        </section>
    </section>



</main>