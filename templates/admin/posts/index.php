
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> پست ها</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="<?= url("admin/post/create"); ?>" class="btn btn-sm btn-success">جدید</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>لیست پست ها</caption>
            <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان</th>
                <th>خلاصه</th>
                <th>بیننده</th>
                <th>وضعیت</th>
                <th>نویسنده</th>
                <th>دسته بندی</th>
                <th>تصویر</th>
                <th>کارها</th>
            </tr>
            </thead>
            <tbody>
<?php foreach ($parametrs as $post){  ?>
            <tr>
                <td>
                    <a class="text-primary" href="">
                        <?= $post['id'] ?>
                    </a>
                </td>
                <td>
                    <?= $post['title'] ?>
                <td>
                    <?= $post['summary'] ?>
                </td>
                <td>
                    <?= $post['view'] ?>
                </td>
                <td>
                    <?php if ($post['breaking_news']==true){ ?>
                    <span class="badge badge-success">#خبر-فوری</span>
                    <?php }
                    if ($post['selected']==true){
                    ?>
                    <span class="badge badge-dark">#منتخب-سردبیر</span>
                    <?php } ?>
                </td>
                <td>
                    <?= $post['userName'] ?>
                </td>
                <td>
                    <?= $post['categoryName'] ?>
                </td>
                <td><img style="width: 80px;" src="<?= assets($post['image']) ?>" alt=""></td>
                <td style="width: 25rem;">
                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white"
                       href="<?= url("admin/post/change_breaking_news/".$post['id']); ?>">
                        <?php if ($post['breaking_news']==true){ ?>
                        لغو خبر فوری
                        <?php }else{ ?>
                        افزودن به اخبار فوری
                        <?php } ?>
                    </a>
                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white"
                       href="<?= url("admin/post/change_selected/".$post['id']); ?>">
                        <?php if ($post['selected']==true){ ?>
                        لغو منتخب سردبیر
                        <?php }else{ ?>
                        انتخاب منتخب سردبیر
                        <?php } ?>
                    </a>
                    <hr class="my-1" />
                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url("admin/post/edit/".$post['id']); ?>">ویرایش</a>
                    <a role="button" class="btn btn-sm btn-danger text-white"
                       href="<?= url("admin/post/delete/".$post['id']); ?>">حذف</a>
                </td>
                <?php  } ?>
            </tr>
            </tbody>

        </table>
    </div>




</main>