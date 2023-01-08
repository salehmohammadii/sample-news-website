<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> نظرات</h1>

    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>لیست نظرات</caption>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام کاربر</th>
                <th>پست مربوطه</th>
                <th>نظر</th>
                <th>وضعیت</th>
                <th>کارها</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($parametrs as $comment){  ?>
            <tr>
                <td>
                    <a href="">
                        <?= $comment['commentId'] ?>
                    </a>
                </td>
                <td>
                    <?= $comment['userName'] ?>
                </td>
                <td>
                    <?= $comment['postTitle'] ?>
                </td>
                <td>
                    <?= $comment['comment'] ?>
                </td>
                <td>
                    <?php if ($comment['status']=="approved"){ ?>
                    تایید شده
                    <?php }else{ ?>
                    رد شده
                    <?php  } ?>
                </td>
                <td>
<?php if ($comment['status']=="approved"){ ?>
                    <a role="button" class="btn btn-sm btn-warning text-white" href="<?= url("admin/comment/not-approved/".$comment['commentId']); ?>">رد کردن</a>
                    <?php }else{ ?>
                    <a role="button" class="btn btn-sm btn-success text-white" href="<?= url("admin/comment/approved/".$comment['commentId']); ?>">تایید</a>
                    <?php } ?>

                </td>
            </tr>
            <?php } ?>

            </tbody>
        </table>
    </section>


</main>