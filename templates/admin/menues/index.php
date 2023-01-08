<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> منو ها</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="<?= url("admin/menue/create") ?>" class="btn btn-sm btn-success">جدید</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>لیست منو ها</caption>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>لینک</th>
                <th>کارها</th>
            </tr>
            </thead>
            <tbody>
<?php foreach ($parametrs as $menue){ ?>
            <tr>
                <td>
                    <?=  $menue['id'] ?>
                </td>
                <td>
                    <?=  $menue['name'] ?>
                </td>
                <td>
                    <?=  $menue['url'] ?>
                </td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url("admin/menue/edit/".$menue['id']) ?>">ویرایش</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url("admin/menue/delete/".$menue['id']) ?>">حذف</a>
                </td>
            </tr>
            <?php } ?>


            </tbody>
        </table>
    </section>

</main>
