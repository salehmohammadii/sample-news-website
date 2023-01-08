// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.


self.addEventListener('notificationclick', function (event) {
    console.log('On notification click: ', event.notification);
    event.notification.close();
    var redirectUrl = "http://localhost/project";
    console.log("redirect url is : " + redirectUrl);
    if (redirectUrl) {
        event.waitUntil(async function () {
            var allClients = await clients.matchAll({
                includeUncontrolled: true
            });
            var chatClient;
            for (var i = 0; i < allClients.length; i++) {
                var client = allClients[i];
                if (client['url'].indexOf(redirectUrl) >= 0) {
                    client.focus();
                    chatClient = client;
                    break;
                }
            }
            if (chatClient == null || chatClient == 'undefined') {
                chatClient = clients.openWindow(redirectUrl);
                return chatClient;
            }
        }());
    }
});

self.addEventListener("notificationclose", function (event) {
    event.notification.close();
    console.log('user has clicked notification close');
});




importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');
firebase.initializeApp({
    apiKey: "AIzaSyBosCIFGLh1ouoWG7OcBgQL7yVGBLHu-M0",
    authDomain: "iaun-news.firebaseapp.com",
    projectId: "iaun-news",
    storageBucket: "iaun-news.appspot.com",
    messagingSenderId: "463974271578",
    appId: "1:463974271578:web:9c90301a11b4551ad1a663"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
messaging.onBackgroundMessage((payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);

    // Customize notification here
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: 'public/app/img/logo.png'
    };
    self.registration.showNotification(notificationTitle,
        notificationOptions);
});

