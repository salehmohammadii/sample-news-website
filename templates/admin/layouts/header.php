<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="" type="image/x-icon" />

    <link rel="stylesheet" href="<?= assets('public/admin-panel/css/bootstrap.min.css') ?>" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">

    <link href="<?= assets('public/admin-panel/css/style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= assets('public/jalalidatepicker/persian-datepicker.min.css') ?>" rel="stylesheet" type="text/css">

</head>

<body>

<nav class="navbar  navbar-light bg-gradiant-green-blue nav-shadow">

    <a class="navbar-brand" href=""></a>
    <span class="">
   </a>
        <span class="dropdown">
                <a class="dropdown-toggle text-decoration-none text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>

                </a>
                <div class="dropdown-menu dropdown-menu-left " aria-labelledby="navbarDropdown" style="text-align: right">
                    <a class="dropdown-item" href="<?= url("auth/log-out") ?>">خروج از حساب</a>
                </div>
            </span>
        </span>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block pt-3 bg-sidebar sidebar px-0">
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin") ?>"><i class="fas fa-home"></i> خانه</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/category") ?>"><i class="fas fa-clipboard-list"></i> دسته بندی ها</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/post") ?>"><i class="fas fa-newspaper"></i> پست ها</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/banner") ?>"><i class="fas fa-image"></i> تبلیغات</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/comment") ?>"><i class="fas fa-comments"></i> نظرات</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/menue") ?>"><i class="fas fa-bars"></i> منو ها</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/user") ?>"><i class="fas fa-users"></i> کاربران</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("admin/web_settings") ?>"><i class=" fas fa-tools "></i> تنظیمات سایت</a>
            <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url("home") ?>"><i class=" fas fa-home "></i> نمایش سایت</a>
        </nav>

