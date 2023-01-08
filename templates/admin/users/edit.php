<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">ویرایش کاربر</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">

            <form method="post" action="<?= url("admin/user/update/".$parametrs['id']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">نام کاربری</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری را وارد کنید" value="<?= $parametrs['username'] ?>">
                </div>

                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="ایمیل را وارد کنید..." value="<?= $parametrs['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="رمز عبور را وارد کنید..." value="">
                </div>

                <div class="form-group">
                    <label for="permission">دسترسی</label>
                    <select name="permission" id="permission" class="form-control" required autofocus>
                        <option value="false" <?= ($parametrs['permission']==false)?"selected":"" ?>  >کاربر</option>
                        <option value="1" <?= ($parametrs['permission']==1)?"selected":"" ?> >مدیر</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">update</button>
            </form>
        </section>
    </section>




</main>