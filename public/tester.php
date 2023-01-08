<?php
//require_once 'noti_tester.php';
require_once 'noti_tester.php';
sleep(5);
$web_token="esiLzM3N5cQCBUUUDNTDZA:APA91bGc7ewUMioYCT2zcLfSo0WC0ra3kl-TeszEKgzxnv0iIB6sNFalbMNjqw-0Kd_wpd5kX7-RLzB_eRK0mAY3NQBPagw_ZqFA9PsCp2gwM7NGulEhWL1i7MaLiPfBRgu1bwG_Gxcx";
$token="cMLLn-F6TpC4sjepZ0_LoX:APA91bG8fTCFeT1xL9Kg7VuHPiHax2bWnj1v32sk5I_m-cVkeYq_TevMe52TmFT0LnXFYvpJfr5ky8mJ8FXlNhqV7IPa6sa9yZIHl16lhp6LFEdkaa0F8z_Q1lcbL_8x9BAHVAZcG7eB";
echo send_server_message(array($web_token,$token), "سفارش جدید", "سفارش جدید برای شما درج شده است!");

  //  null),"salam","salam");
//echo send_fcm_message("eFcF2ZJBd-lTKsONKkEOvT:APA91bHEB7XjtU452f5u3xX9rGSonPCCcLqrX-BULcPGsLU6sYuPNs4RepP79aZZB-lIG_mKvxoTZbuP5QWnCIV877VEnQ92fLELp-KRqej9EcvH4e4heK6kLtNd2S3fT4tNOJuZAkpt"
//,"salam","hi",true);
//$url = 'https://saleh-mohammadi.ir/public/notif-manager.php';
//$token="cMLLn-F6TpC4sjepZ0_LoX:APA91bG8fTCFeT1xL9Kg7VuHPiHax2bWnj1v32sk5I_m-cVkeYq_TevMe52TmFT0LnXFYvpJfr5ky8mJ8FXlNhqV7IPa6sa9yZIHl16lhp6LFEdkaa0F8z_Q1lcbL_8x9BAHVAZcG7eB";
//$body="hi";
//$title="hi";
//$data = array('token' => $token, 'body' => $body, 'title' => $title, 'type' => 'costumer' , 'multiply'=>false);
//$data = ['token' => $token, 'body' => $body, 'title' => $title, 'type' => 'costumer' , 'multiply'=>false];
//$data = ['token' => $token, 'body' => $body, 'title' => $title, 'type' => 'costumer' , 'multiply'=>false];
////$token=json_encode($token);
//$data="token=$token&body=$body&title=$title&type=costumer&multiply=true";
//echo $data."\n";
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, true);
////curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//$result = curl_exec($ch);
//curl_close($ch);
//echo json_encode($result);
//return ($result === true);
//

