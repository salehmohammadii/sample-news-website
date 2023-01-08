
<div class="site-main-container">

    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row small-gutters">
                <?php if (!empty($parametrs['selected_news'])){ ?>
                <?php if (isset($parametrs['selected_news'][0])){ ?>
                <div class="col-lg-8 top-post-left">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="<?= assets($parametrs['selected_news'][0]['image']) ?>" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="<?= url("home/category/".$parametrs['selected_news'][0]['category']) ?>"><?= $parametrs['selected_news'][0]['category'] ?></a></li>
                        </ul>
                        <a href="<?= url("home/post/". $parametrs['selected_news'][0]['id']) ?>">
                            <h3><?= $parametrs['selected_news'][0]['title'] ?></h3>
                        </a>
                        <ul class="meta">
                            <li><a href="<?= url("home/user/".$parametrs['selected_news'][0]['user_id']) ?>"><span class="fa-user"></span><?= $parametrs['selected_news'][0]['name']." ". $parametrs['selected_news'][0]['family'] ?></a></li>
                            <li><a href="<?= url("home/date/".explode(" ",$parametrs['selected_news'][0]['updated_at'])[0]) ?>"><?= toShamsi($parametrs['selected_news'][0]['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="<?= url("home/post/". $parametrs['selected_news'][0]['id']) ?>"><?= $parametrs['selected_news'][0]['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
                <?php }
                if (isset($parametrs['selected_news'][1])){
                ?>
                <div class="col-lg-4 top-post-right">
                    <div class="single-top-post">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= assets($parametrs['selected_news'][1]['image']) ?>" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="<?= url("home/category/".$parametrs['selected_news'][1]['category']) ?>"><?= $parametrs['selected_news'][1]['category'] ?></a></li>
                            </ul>
                            <a href="<?= url("home/post/". $parametrs['selected_news'][1]['id']) ?>">
                                <h4><?= $parametrs['selected_news'][1]['title'] ?></h4>
                            </a>
                            <ul class="meta">
                                <li><a href="<?= url("home/user/".$parametrs['selected_news'][1]['user_id']) ?>"><span class="lnr lnr-user"></span><?= $parametrs['selected_news'][1]['name']." ". $parametrs['selected_news'][1]['family'] ?></a></li>
                                <li><a href="<?= url("home/date/".explode(" ",$parametrs['selected_news'][1]['updated_at'])[0]) ?>"><?= toShamsi($parametrs['selected_news'][1]['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="<?= url("home/post/". $parametrs['selected_news'][1]['id']) ?>"><?= $parametrs['selected_news'][1]['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php }
                    if (isset($parametrs['selected_news'][2])){
                    ?>
                    <div class="single-top-post mt-10">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= assets($parametrs['selected_news'][2]['image']) ?>" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="<?= url("home/category/".$parametrs['selected_news'][2]['category']) ?>"><?= $parametrs['selected_news'][2]['category'] ?></a></li>
                            </ul>
                            <a href="<?= url("home/post/". $parametrs['selected_news'][2]['id']) ?>">
                                <h4><?= $parametrs['selected_news'][2]['title'] ?></h4>
                            </a>
                            <ul class="meta">
                                <li><a href="<?= url("home/user/".$parametrs['selected_news'][2]['user_id']) ?>"><span class="lnr lnr-user"></span><?= $parametrs['selected_news'][2]['name']." ". $parametrs['selected_news'][2]['family'] ?></a></li>
                                <li><a href="<?= url("home/date/".explode(" ",$parametrs['selected_news'][2]['updated_at'])[0]) ?>"><?= toShamsi($parametrs['selected_news'][2]['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="<?= url("home/post/". $parametrs['selected_news'][2]['id']) ?>"><?= $parametrs['selected_news'][2]['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php  }
            }
            if (isset($parametrs['breaking_news'])){
            ?>
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>خبر فوری:</span><a href="<?= url("home/post/".$parametrs['breaking_news']['id']) ?>"><?= $parametrs['breaking_news']['title'] ?></a></h6>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>

    <section class="latest-post-area pb-4">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">آخرین اخبار</h4>
                       <?php foreach ($parametrs['latest_post'] as $latest_post){ ?>
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?= assets($latest_post['image']) ?>" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="<?= url("home/post/".$latest_post['id']) ?>"><?=$latest_post['category'] ?></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="<?= url("home/post/".$latest_post['id']) ?>">
                                    <h4><?=$latest_post['title'] ?></h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="<?= url("home/user/".$parametrs['popular_post'][0]['user_id']) ?>"><span class="lnr lnr-user"></span><?=$latest_post['name']." ".$latest_post['family']  ?></a></li>
                                    <li><a href="<?= url("home/date/".explode(" ",$latest_post['updated_at'])[0]) ?>"><?=toShamsi($latest_post['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="<?= url("home/post/".$latest_post['id']) ?>"><?=$latest_post['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                    <?=$latest_post['summary'] ?>
                                </p>
                            </div>
                        </div>
                        <?php }
                       ?>
                    </div>
                    <!-- End latest-post Area -->

                    <!-- Start banner-ads Area -->
                    <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                        <img class="img-fluid" src="<?= $parametrs['banners'][0]['image'] ?>" alt="">
                    </div>
                    <!-- End banner-ads Area -->
                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">اخبار پربازدید</h4>
                        <div class="feature-post relative">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= assets($parametrs['popular_post'][0]['image']) ?>" alt="">
                            </div>
                            <div class="details">
                                <ul class="tags">
                                    <li><a href="<?= url("home/post/".$parametrs['popular_post'][0]['id']) ?>"><?= $parametrs['popular_post'][0]['category'] ?></a></li>
                                </ul>
                                <a href="<?= url("home/post/".$parametrs['popular_post'][0]['id']) ?>">
                                    <h3><?= $parametrs['popular_post'][0]['title'] ?></h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="<?= url("home/user/".$parametrs['popular_post'][0]['user_id']) ?>"><span class="lnr lnr-user"></span><?= $parametrs['popular_post'][0]['name']." ". $parametrs['popular_post'][0]['family'] ?></a></li>
                                    <li><a href="<?= url("home/date/".explode(" ",$parametrs['popular_post'][1]['updated_at'])[0]) ?>"><?= toShamsi($parametrs['popular_post'][0]['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="<?= url("home/post/".$parametrs['popular_post'][0]['id']) ?>"><?= $parametrs['popular_post'][0]['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-20 medium-gutters">
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= assets($parametrs['popular_post'][1]['image']) ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?= url("home/category/".str_replace(" ","-",str_replace(" ","-", $parametrs['popular_post'][1]['category']))) ?>"><?= $parametrs['popular_post'][1]['category'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="<?= url("home/post/".$parametrs['popular_post'][1]['id']) ?>">
                                        <h4><?= $parametrs['popular_post'][1]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="<?= url("home/user/".$parametrs['popular_post'][1]['user_id']) ?>"><span class="lnr lnr-user"></span><?= $parametrs['popular_post'][1]['name']." ". $parametrs['popular_post'][1]['family'] ?></a></li>
                                        <li><a href="<?= url("home/date/".explode(" ",$parametrs['popular_post'][1]['updated_at'])[0]) ?>"><?= toShamsi($parametrs['popular_post'][1]['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="<?= url("home/post/".$parametrs['popular_post'][1]['id']) ?>"><?= $parametrs['popular_post'][1]['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?= $parametrs['popular_post'][1]['summary'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= $parametrs['popular_post'][2]['image'] ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?= url("home/category/".str_replace(" ","-", $parametrs['popular_post'][2]['category'])) ?>"><?= $parametrs['popular_post'][2]['category'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="<?= url("home/post/".$parametrs['popular_post'][2]['id']) ?>">
                                        <h4><?= $parametrs['popular_post'][2]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="<?= url("home/user/".$parametrs['popular_post'][2]['user_id']) ?>"><span class="lnr lnr-user"></span><?= $parametrs['popular_post'][2]['name']." ". $parametrs['popular_post'][2]['family'] ?></a></li>
                                        <li><a href="<?= url("home/date/".explode(" ",$parametrs['popular_post'][2]['updated_at'])[0]) ?>"><?= toShamsi($parametrs['popular_post'][2]['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="<?= url("home/post/".$parametrs['popular_post'][2]['id']) ?>"><?= $parametrs['popular_post'][2]['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?= $parametrs['popular_post'][2]['summary'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End popular-post Area -->
                </div>
