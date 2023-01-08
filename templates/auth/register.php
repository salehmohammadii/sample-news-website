

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?=assets("public/auth/assets/images/img-01.png") ?>" alt="IMG">
            </div>

            <form method="post" action="<?=url("auth/register/store") ?>" class="login100-form validate-form"  enctype="multipart/form-data">
                    <span class="login100-form-title">
                        عضویت
                    </span>
                <?php
                $error=flash("register_error");
                if (!empty($error)){ ?>
                <div class="mb-2 alert alert-danger"> <small class="form-text text-danger"><?= $error ?></small> </div>
                <?php } ?>


                <div class="wrap-input100 validate-input" data-validate="ایمیل معتبر نیست.">
                    <input class="input100" type="text" name="account-name" placeholder="شناسه کاربری">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="wrap-input100"">
                    <input class="input100" type="text" name="name" placeholder="نام">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="text" name="family" placeholder="نام خانوادگی">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="ایمیل معتبر نیست">
                    <input class="input100" type="text" name="username" placeholder="ایمیل">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="رمز عبور نباید خالی باشد.">
                    <input class="input100" type="password" name="password" placeholder="رمز عبور">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="container-login100-form-btn form-control">
                    <label for="image">تصویر حساب کاربری</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-12">
                        <span class="txt1">
                            فراموشی
                        </span>
                    <a class="txt2" href="<?=url("auth/forgot-password") ?>">
                        رمز عبور؟
                    </a>
                </div>


                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        ورود به حساب کاربری
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#BSbtninfo').filestyle({

        buttonName : 'btn-info',

        buttonText : ' Select a File'

    });

</script>

