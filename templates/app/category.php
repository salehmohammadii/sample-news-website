<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white">اخبار دسته بندی <?= $parametrs['posts'][0]['category'] ?></h1>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>خبر فوری</span> <a href="<?= url("home/post/".$parametrs['breaking_news']['id']) ?>"><?= $parametrs["breaking_news"]["title"] ?></a></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">آخرین اخبار</h4>

                        <?php
                        foreach ($parametrs['posts'] as $post){ ?>


                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?=assets($post['image']) ?>" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="#"><?= $post['category'] ?></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="image-post.html">
                                    <h4><?= $post['title'] ?></h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?=  $post['name'] ?></a></li>
                                    <li><a href="<?= url("home/date/".explode(" ",$post['updated_at'])[0]) ?>"><?= toShamsi($post['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"> <?= $post['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                    <?= $post['summary'] ?>
                                </p>
                            </div>
                        </div>

                        <?php } ?>



                    </div>
                    <!-- End latest-post Area -->
                    <!-- Start banner-ads Area -->
                </div>
