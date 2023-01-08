<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-image"></i> تبلیغات</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="<?= url('admin/banner/create') ?>" class="btn btn-sm btn-success">جدید</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>لیست تبلیغات</caption>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>لینک</th>
                <th>تصویر</th>
                <th>کارها</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($parametrs as $banner) {?>
            <tr>
                <td>
                    <?= $banner['id'] ?>
                </td>
                <td>
                    <?= $banner['url'] ?>
                </td>
                <td><img style="width: 80px;" src="<?= assets($banner['image']) ?> " alt=""></td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url('admin/banner/edit/'.$banner['id']) ?>">ویرایش</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url('admin/banner/delete/'.$banner['id']) ?>">حذف</a>
                </td>
            </tr>
            <?php   } ?>

            </tbody>

        </table>
    </div>




</main>