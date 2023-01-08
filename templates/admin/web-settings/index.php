<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> تنظیمات سایت</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="<?= url("admin/web_settings/edit") ?>" class="btn btn-sm btn-success">تنظیم جدید</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>تنظیمات</caption>
            <thead>
            <tr>
                <th>نام</th>
                <th>
                    مقدار
                </th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>عنوان سایت</td>
                <td>
                    <?= $parametrs['title'] ?>
                </td>
            </tr>
            <tr>
                <td>توضیحات سایت</td>
                <td>
                    <?= $parametrs['description'] ?>
                </td>
            </tr>
            <tr>
                <td>کلمات کلیدی</td>
                <td>
                    <?= $parametrs['keywords'] ?>
                </td>
            </tr>
            <tr>
                <td>شماره تماس</td>
                <td>
                    <?= $parametrs['phone'] ?>
                </td>
            </tr>
            <tr>
                <td>ایمیل</td>
                <td>
                    <?= $parametrs['email'] ?>
                </td>
            </tr>
            <tr>
                <td>لوگو</td>
                <td><img src="<?= assets($parametrs['logo']) ?>" alt="" width="100px" height="100px"></td>
            </tr>
            <tr>
                <td>آیکون</td>
                <td><img src="<?= assets($parametrs['icon']) ?>" alt="" width="100px" height="100px"> </td>
            </tr>
            </tbody>
        </table>
    </section>



</main>