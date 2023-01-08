
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">پست جدید</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="POST" action="<?= url('admin/post/store') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان را وارد کنید" required autofocus>
                </div>

                <div class="form-group">
                    <label for="cat_id">دسته بندی</label>
                    <select name="cat_id" id="cat_id" class="form-control" required autofocus>
                            <?php foreach ($parametrs as $category){  ?>
                            <option value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                            <?php } ?>


                    </select>
                </div>

                <div class="form-group">
                    <label for="image" >تصویر</label>
                    <input type="file"  id="image" name="image" class="form-control p-1"  placeholder="انتخاب تصویر" required autofocus>
                </div>



                <div class="form-group">
                    <label for="summary">خلاصه</label>
                    <textarea class="form-control" id="summary" name="summary" placeholder="خلاصه" rows="3" required autofocus></textarea>
                </div>

                <div class="form-group">
                    <label for="body">متن پست</label>
                    <textarea class="form-control" id="body" name="body" placeholder="متن پست" rows="5" required autofocus></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">ذخیره</button>
            </form>
        </section>
    </section>


</main>