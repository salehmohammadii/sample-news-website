<!DOCTYPE html>
<html lang="fa"dir="rtl"class="no-js">

<head>
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon"href="<?=assets( $parametrs['settings']['icon'])?>">
    <meta name="author"content="colorlib">
    <meta name="description"content="<?= $parametrs['settings']['description']?>">
    <meta name="keywords"content="<?= $parametrs['settings']['keywords']?>">
    <meta charset="UTF-8">
    <title><?= $parametrs['settings']['title']?></title>
    <link rel="stylesheet"href="<?= assets("public/app/css/linearicons.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/font-awesome.min.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/bootstrap.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/magnific-popup.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/nice-select.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/animate.min.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/owl.carousel.css")?>">
    <link rel="stylesheet"href="<?= assets("public/app/css/jquery-ui.css")?>">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"href="<?= assets("public/app/css/main.css")?>">
</head>

<body>
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                    <?php if ($parametrs['user']==false){ ?>
                        <div class="btn" style="width: fit-content">
                        <a class="navbar-brand text-white btn btn-light text-dark" href="<?= url("auth/login") ?>">ورود به حساب کاربری</a>
                </div>
                </div>
                    <?php }else{ ?>
                        <div class="dropdown" style="width: fit-content">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-white"><?= $parametrs['user']['username']?></span>
                                <img class="rounded-circle" style="height: 40px"src="<?= assets($parametrs['user']['image']) ?>"/>
                            </button>
                            <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
                                <?php if ($parametrs['user']['permission']==1){ ?>
                                    <a href="<?= url("admin") ?>" class="dropdown-item">
                                        پنل مدیریت
                                    </a>
                                <?php } ?>
                                <a href="<?= url("auth/log-out") ?>" class="dropdown-item logout">
                                    خروج
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right pt-3">
                    <ul>
                        <li><a href="tel:<?= $parametrs['settings']['phone']?>"><span class="lnr lnr-phone-handset"></span><span><?= $parametrs['settings']['phone']?></span></a></li>
                        <li><a href="mailto:<?= $parametrs['settings']['email']?>"><span class="lnr lnr-envelope"></span><span><?= $parametrs['settings']['email']?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <a href="<?= url("home") ?>">
                        <img class="img-fluid"src="<?= assets("public/app/img/logo.png") ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding">
                    <img class="img-fluid"src="<?= assets($parametrs['banners'][0]['image']) ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <?php foreach ($parametrs['menues'] as $menue){ ?>
                    <li class="menu-active"><a href="<?= $menue['url'] ?>"><?= $menue['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
</body>
</html>
