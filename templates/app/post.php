<div class="site-main-container">
    <!--
    Start top-post Area

    -->
    <!--
    End top-post Area

    -->
    <!--
    Start latest-post Area

    -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <div class="feature-img-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= assets($parametrs['post']['image']) ?>" alt="">
                        </div>
                        <div class="content-wrap">
                            <ul class="tags mt-10">
                                <li><a href="#"><?= $parametrs['post']['category'] ?></a></li>
                            </ul>
                            <a href="#">
                                <h3><?= $parametrs['post']['title'] ?></h3>
                            </a>
                            <ul class="meta pb-20">
                                <li><a href="#"><span
                                                class="lnr lnr-user"></span><?= $parametrs['post']['name'] . " " . $parametrs['post']['family'] ?>
                                    </a></li>
                                <li><a href="#"><?= toShamsi($parametrs['post']['updated_at']) ?><span
                                                class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"><?= count($parametrs['comment']) ?><span class="lnr lnr-bubble"></span></a>
                                </li>
                            </ul>
                            <?= $parametrs['post']['body'] ?>


                            <div class="comment-sec-area">
                                <div class="container">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <?php if ($parametrs['user'] == false) { ?>
                                <div class="card">
                                    <div class="card-header">
                                        ثبت نظر
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">جهت ارسال نظر و دیدگاه خود یا مشاهده نظرات بقیه کاربران باید ابتدا وارد سایت شوید. جهت
                                            ورود به حساب کاربری روی دکمه پایین کلیک کنید</p>
                                        <a href="<?= url("auth/login") ?>" class="btn btn-primary">ورود به حساب
                                            کاربری</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="card-header">
                                    ثبت نظر
                                </div>
                                <form action="<?= url("home/comment/store/" . $parametrs['post']['id'] . "/" . $parametrs['user']['id']) ?>"
                                      method="post">
                                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                        <div class="d-flex flex-start w-100">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                 src="<?= assets($parametrs['user']['image']) ?>"
                                                 alt="avatar" width="40"
                                                 height="40"/>
                                            <div class="form-outline w-100">

                <textarea name="comment" class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                                            </div>
                                        </div>
                                        <div class="float-end mt-2 pt-1">
                                            <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                        </div>

                                    </div>
                                </form>

                            <?php foreach ($parametrs['comment'] as $comment) { ?>
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                             src="<?= assets($comment['image']) ?>"
                                             alt="avatar" width="60"
                                             height="60"/>
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1"><?= $comment['username'] ?></h6>
                                            <p class="text-muted small mb-0">
                                                <?= toShamsi($comment['Cdate']) ?>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-2 mb-2 pb-1">
                                        <?= $comment['comment'] ?>
                                    </p>
                                </div>
                            <?php
                            }
                            } ?>

                        </div>
                    </div>
                </div>