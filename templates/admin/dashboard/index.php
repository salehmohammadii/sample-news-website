<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row mt-3">

        <div class="col-sm-6 col-lg-3">
            <a href="<?= url("admin/category") ?>" class="text-decoration-none">
                <div class="card text-white bg-gradiant-green-blue mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-clipboard-list"></i> دسته بندی ها</span> <span class="badge badge-pill right"><?= $parametrs['stats']['categorycount'] ?></span></div>
                    <div class="card-body">
                        <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> رفتن به دسته بندی ها</section>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="<?= url("admin/user") ?>" class="text-decoration-none">
                <div class="card text-white bg-juicy-orange mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-users"></i> کاربران</span> <span class="badge badge-pill right"><?= $parametrs['stats']['allusercount'] ?></span></div>
                    <div class="card-body">
                        <section class="d-flex justify-content-between align-items-center font-12">
                            <span class=""><i class="fas fa-users-cog"></i> مدیر <span class="badge badge-pill mx-1"><?= $parametrs['stats']['admincounts'] ?></span></span>
                            <span class=""><i class="fas fa-user"></i>کاربر <span class="badge badge-pill mx-1"><?= $parametrs['stats']['usercount'] ?></span></span>
                        </section>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="<?= url("admin/post") ?>" class="text-decoration-none">
                <div class="card text-white bg-dracula mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i> پست ها</span> <span class="badge badge-pill right"><?= $parametrs['stats']['postscount'] ?></span></div>
                    <div class="card-body">
                        <section class="d-flex justify-content-between align-items-center font-12">
                            <span class=""><i class="fas fa-bolt"></i> بیننده <span class="badge badge-pill mx-1"><?= $parametrs['stats']['postsview'] ?></span></span>
                        </section>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="<?= url("admin/comment") ?>" class="text-decoration-none">
                <div class="card text-white bg-neon-life mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-comments"></i> نظرات</span> <span class="badge badge-pill right"><?= $parametrs['stats']['commentcount'] ?></span></div>
                    <div class="card-body">
                        <!--                        <h5 class="card-title">Info card title</h5>-->
                        <section class="d-flex justify-content-between align-items-center font-12">
                            <span class=""><i class="far fa-eye-slash"></i> بررسی نشده <span class="badge badge-pill mx-1"><?= $parametrs['stats']['unseencount'] ?></span></span>
                            <span class=""><i class="far fa-check-circle"></i> تایید شده <span class="badge badge-pill mx-1"><?= $parametrs['stats']['approvedcount'] ?></span></span>
                        </section>
                    </div>
                </div>
            </a>
        </div>

    </div>


    <div class="row mt-2">
        <div class="col-4">
            <h2 class="h6 pb-0 mb-0">
                پر بیننده ترین پست ها
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>

                    <tr>
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>بیننده</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($parametrs['most_viewd_posts'] as $most_viewd_post){ ?>

                        <tr>
                        <td>
                            <a class="text-primary" href="">
                                <?= $most_viewd_post['id'] ?>
                            </a>
                        </td>
                        <td>
                            <?= $most_viewd_post['title'] ?>
                        </td>
                        <td><span class="badge badge-secondary"><?= $most_viewd_post['view'] ?></span></td>
                    </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <h2 class="h6 pb-0 mb-0">
                پر بحث ترین پست ها

            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>نظرات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($parametrs['most_commented_posts'] as $most_commented_post){ ?>
                    <tr>
                        <td>
                            <a class="text-primary" href="">
                                <?= $most_commented_post['post_id'] ?>
                            </a>
                        </td>
                        <td>
                            <?= $most_commented_post['title'] ?>
                        </td>
                        <td><span class="badge badge-success">
                                <?= $most_commented_post['count'] ?>
                            </span></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <h2 class="h6 pb-0 mb-0">
                نظرات
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>کاربر</th>
                        <th>نظر</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($parametrs['comments'] as $comment){ ?>
                    <tr>
                        <td>
                            <a class="text-primary" href="">
                                <?= $comment['id'] ?>
                            </a>
                        </td>
                        <td>
                            <?= $comment['username'] ?>

                        </td>
                        <td>
                            <?= $comment['comment'] ?>
                        </td>
                        <td>
                            <?php if ($comment['status']=="unseen"){ ?>
                            <span class="badge badge-warning">
                                دیده نشده
                            </span>
                            <?php } ?>
                            <?php if ($comment['status']=="seen"){ ?>
                            <span class="badge badge-secondary">
                                دیده شده
                            </span>
                            <?php } ?>
                            <?php if ($comment['status']=="approved"){ ?>
                                <span class="badge badge-success">
                                    تایید شده
                            </span>
                            <?php } ?>
                            </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</main>