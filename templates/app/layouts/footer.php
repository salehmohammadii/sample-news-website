<div class="col-lg-4 pr-0">
    <div class="sidebars-area">
        <?php if (isset($parametrs['selected_news'][3])){ ?>
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">انتخاب سردبیر</h6>
            <div class="editors-pick-post">
                <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="<?=assets($parametrs['selected_news'][3]['image'])  ?>" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="<?= url("home/category/".$parametrs['selected_news'][3]['category']) ?>"><?=$parametrs['selected_news'][3]['category']  ?></a></li>
                    </ul>
                </div>
                <div class="details">
                    <a href="<?= url("home/post/". $parametrs['selected_news'][3]['id']) ?>">
                        <h4 class="mt-20"><?=$parametrs['selected_news'][3]['title']  ?></h4>
                    </a>
                    <ul class="meta">
                        <li><a href="<?= url("home/user/".$parametrs['selected_news'][3]['user_id']) ?>"><span class="lnr lnr-user"></span><?= $parametrs['selected_news'][3]['name']." ". $parametrs['selected_news'][3]['family'] ?></a></li>
                        <li><a href="<?= url("home/date/".explode(" ",$parametrs['selected_news'][3]['updated_at'])[0]) ?>"><?=toShamsi($parametrs['selected_news'][3]['updated_at'])  ?><span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="<?= url("home/post/". $parametrs['selected_news'][3]['id']) ?>"><?=$parametrs['selected_news'][3]['comment']  ?><span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                    <p class="excert">
                        <?=$parametrs['selected_news'][3]['summary']  ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="single-sidebar-widget ">
            <img class="img-fluid" src="<?= assets($parametrs['banners'][0]['image']) ?>" alt="">
        </div>

        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">پر بحث ترین ها</h6>
            <?php foreach ($parametrs['most_commented'] as $most_commented){  ?>
            <div class="editors-pick-post">
                <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
            <div class="single-list flex-row d-flex">
                <div class="thumb nav-img col-lg-5">
                    <img src="<?= assets($most_commented['image']) ?>" alt="">
                </div>
                <div class="details col-lg-7" style="padding: 0">
                    <a href="<?= url("home/post/". $most_commented['id']) ?>">
                        <h6 class="most-commented-title"><?= $most_commented['title'] ?></h6>
                    </a>
                    <ul class="meta">
                        <li><a href="<?= url("home/date/".explode(" ",$most_commented['updated_at'])[0]) ?>"><?= toShamsi($most_commented['updated_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="<?= url("home/post/". $most_commented['id']) ?>"><?= $most_commented['comment'] ?><span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                </div>
            </div>
            </div>
            </div>
            </div>
            <?php } ?>

        </div>

    </div>
</div>
</div>
</div>
</section>
<!-- End latest-post Area -->
</div>

<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>اخبار پربازدید</h4>
                <ul>
                    <?php foreach ($parametrs['most_viewd_posts'] as $most_viewed_post){ ?>
                    <li><a href="#"><?= $most_viewed_post['title'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>لینک سریع</h4>
                <ul>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">سوالات متداول</a></li>
                </ul>
            </div>

        </div>
        <div class="footer-bottom row align-items-center">
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>


        </div>

    </div>
</footer>
<!-- End footer Area -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="module">
    import {initializeApp} from "https://www.gstatic.com/firebasejs/9.12.0/firebase-app.js";
    import {getMessaging, getToken, onMessage} from "https://www.gstatic.com/firebasejs/9.12.0/firebase-messaging.js";
    var token="";
    const firebaseConfig = {
        apiKey: "AIzaSyBosCIFGLh1ouoWG7OcBgQL7yVGBLHu-M0",
        authDomain: "iaun-news.firebaseapp.com",
        projectId: "iaun-news",
        storageBucket: "iaun-news.appspot.com",
        messagingSenderId: "463974271578",
        appId: "1:463974271578:web:9c90301a11b4551ad1a663"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    Notification.requestPermission().then(async (permission) => {
      var token= localStorage.getItem("token");
        if (permission == 'granted' && token==null) {
            try {
                window.token = await getToken(messaging, {vapidKey: "BDLIJltgyJ_WM_lLWoToVn47VTL2Wt4q3cSpDxyC47A71pBfJ3gJo9zHMhfdgNYHKj6FLcpK713KrxPqJc40cXo"});
                if (window.token) {
                    console.log(window.token);

                    fetch("http://localhost/notification/set-token/"+window.token).then(res=>{
                       res.json().then(res=>{
                          if (res.status==true){
                              localStorage.setItem("token",window.token);
                          }
                       });
                    });
                } else {
                    console.log('No Instance ID token available. Request permission to generate one.');
                }
            } catch (error) {

                console.log('An error occurred while retrieving token. ', error);


                //BUT THE NEW TOKEN SUCCESSFULY FETCHED
                window.token = await getToken(messaging, {vapidKey: "BDLIJltgyJ_WM_lLWoToVn47VTL2Wt4q3cSpDxyC47A71pBfJ3gJo9zHMhfdgNYHKj6FLcpK713KrxPqJc40cXo"});

                if (window.token) {

                    console.log(window.token);
                    fetch("http://localhost/")
                } else {
                    console.log('No Instance ID token available. Request permission to generate one.');
                }
            }
        }

    }).catch(error => console.log(error));


    // Initialize Firebase Cloud Messaging and get a reference to the service
    const messaging = getMessaging(app);
    navigator.serviceWorker
        .register('/firebase-messaging-sw.js').then
    ((registration) => {
        onMessage(messaging, (payload) => {
            const notificationTitle = payload.notification.title;
            const notificationOptions = {
                body: payload.notification.body,
                icon: 'public/app/img/logo.png'
        };
            registration.showNotification(notificationTitle,
                notificationOptions);
        });
    });
</script>

</body>

</html>