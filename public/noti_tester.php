<?php

 function send_fcm_message($token, $title, $body)
{
    $url = 'https://fcm.googleapis.com/fcm/send';

    $server_key = 'AAAAbAcFilo:APA91bHJgkoFSGRDW3cgpvqpw6CWY_kPAKdMK8QRJ1k2m5cTY_xaBmLRVYWWtY7we0_2gCtmsJMl-rXMqLgvEaRyIDGcewOKwTDoKYGqAxwIWpNFW39cUNuhSIf6FDbLi_nzsaa800CF';
 //  $token = 'fEj7Mz91ToKlPO1z62soZ_:APA91bHSdmtXpLLffr2dvjh1raWE0KaGECM8g6JNwnLlAilmFbKLaKHqgWrBrJZk1zu5z3ruU5A6qbhiJXoPvZ1bM6vbg5tJMx0xZfVhwEcJDybTuj1JH45zSKea_D3Fiy8GFPMzQqVg';

    $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');

    $customData = array('id' => 1,
        'title' => 'سفارش', 'body' => 'سفارش'
    );

    $android = array('notification' => array('sound' => 'notif.mp3'), 'channel_id' => 'ir.hdb.capootseller_notification_id');

    //     android: {
    //   ttl: 3600 * 1000,
    //   notification: {
    //     color: '#ff0000',
    //     sound: 'mysound.mp3',
    //     channel_id: 'my_id' // important to get custom sound
    //   }
    // },



    $data = array(
        'android' => $android,
        "data" => $customData,
        'to' =>
            $token,
        // 'notification' => $notification,
        'priority' => 'high');

    $headers = array(
        'Content-Type:application/json',
        'Authorization:key=' . $server_key
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $result = curl_exec($ch);
    print($result);
    curl_close($ch);

    return ($result === true);


}
function send_server_message($token, $title, $body)
{
    /*     $url = 'https://fcm.googleapis.com/fcm/send';

         $server_key = 'AAAANRKJkYY:APA91bEGmU1MFg9KcqLPD976Ot7ozC4g9oamfRFfXO_vkfutqNaQQbIv-K9V7Bg41umfKEasOW5QCS2ouYdX0y2LIJmrxfJQG-pULAaP3HZZ3kWKMxCJzrP-kZu2_CqJZW_dTE2t5jw2';
         // 'AAAANRKJkYY:APA91bGPZFjajXIvh7np1z9qxOppC67Qmn7oABAZLLxSFF0F72mqYuZ7PwuFi0n-WMXJFb9llx8T-m0I0bvR6pPY7GoI-u3xwunFnBVuJ2JeQrqydEYel-tjFx-VqtWw6wh-kjVwM3Xl';
 //    $token = 'fEj7Mz91ToKlPO1z62soZ_:APA91bHSdmtXpLLffr2dvjh1raWE0KaGECM8g6JNwnLlAilmFbKLaKHqgWrBrJZk1zu5z3ruU5A6qbhiJXoPvZ1bM6vbg5tJMx0xZfVhwEcJDybTuj1JH45zSKea_D3Fiy8GFPMzQqVg';
         $android = array('notification' => array('sound' => 'notif.mp3'), 'channel_id' => 'my_capoot_user_channel');

         $notification = array('title' => $title, 'body' => $body, 'sound' => 'notif.mp3', 'badge' => '1');

         $data = array(
             'android' => $android,
             "data" => $notification,
             'to' => $token
 //        , 'notification' => $notification,
         , 'priority' => 'high');

         $headers = array(
             'Content-Type:application/json',
             'Authorization:key=' . $server_key
         );

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
         $result = curl_exec($ch);
 //    echo $result;
         if ($result === FALSE) {
             return false;
 //        die('Oops! FCM Send Error: ' . curl_error($ch));
         }
         curl_close($ch);
     */
    $url = 'https://saleh-mohammadi.ir/public/notif-manager.php';
    $token=json_encode($token);
    $data="token=$token&body=$body&title=$title&type=costumer&multiply=true";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);
echo json_encode($result);
    return ($result === true);

}


?>