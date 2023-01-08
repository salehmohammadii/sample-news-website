<?php

use database\database;


?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> دسته بندی ها</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="<?= url('admin/category/create') ?>" class="btn btn-sm btn-success">جدید
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>لیست دسته بندی ها</caption>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>فعالیت ها</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($parametrs as $category) { ?>
                <tr>
                    <td>
                        <?= $category['id'] ?>
                    </td>
                    <td>
                        <?= $category['name'] ?>
                    </td>
                    <td>
                        <a role="button" href="<?= url("admin/category/edit/".$category['id']) ?>" class="btn btn-sm btn-info my-0 mx-1 text-white">update</a>
                        <a role="button" href="<?= url("admin/category/delete/".$category['id'])?>" class="btn btn-sm btn-danger my-0 mx-1 text-white">delete</a>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>


</main>
