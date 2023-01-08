<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i>کاربران</h1>

    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of users</caption>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام کاربری</th>
                <th>ایمیل</th>
                <th>دسترسی</th>
                <th>تاریخ عضویت</th>
                <th>کارها</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach ($parametrs as $user){  ?>
            <tr>
                <td>
                    <?=  $user['id']  ?>
                </td>
                <td>
                    <?=  $user['username']  ?>
                </td>
                <td>
                    <?=  $user['email']  ?>
                </td>
                <td>
                    <?= ($user['permission']==1)?"مدیر":"کاربر" ?>
                </td>
                <td>
                    <?= toShamsi($user['created_at'])  ?>
                </td>
                <td>
                    <?php if ($user['permission']==0){  ?>
                    <a role="button" class="btn btn-sm btn-success text-white" href="<?= url("admin/user/set-admin/".$user['id']); ?>">تغییر به مدیر</a>
                    <?php }else{ ?>
                    <a role="button" class="btn btn-sm btn-warning text-white" href="<?= url("admin/user/set-user/".$user['id']); ?>">تغییر به کاربر</a>
                    <?php } ?>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url("admin/user/edit/".$user['id']); ?>">ویرایش</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url("admin/user/delete/".$user['id']); ?>">حذف</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </section>


</main>