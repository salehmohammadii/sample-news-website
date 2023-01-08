<?php


namespace app;


use database\database;

class notification
{
    public function token_store($token){
        $db=new database();
       $token_exist= $db->select("select * from token where token=?",[$token])->fetch();
        if ($token_exist !==false) {
            $status = ['status' => false];
        }else{
            $db->create("token", ['token'], [$token]);
            $status = ['status' => true];
        }
        echo json_encode($status);
    }
    public function send_notification($title,$body){
        $url = 'https://fcm.googleapis.com/fcm/send';
        $db=new database();
        $title=strip_tags($title);
        $body=strip_tags($body);
        $tokens=$db->select("select token from token")->fetchAll();
        $token=[];
        foreach ($tokens as $row){
            array_push($token,$row['token']);
        }
        $notification = array('title' => $title, 'body' => $body, 'sound' => 'notif.mp3', 'badge' => '1');
       $server_key="AAAAbAcFilo:APA91bHJgkoFSGRDW3cgpvqpw6CWY_kPAKdMK8QRJ1k2m5cTY_xaBmLRVYWWtY7we0_2gCtmsJMl-rXMqLgvEaRyIDGcewOKwTDoKYGqAxwIWpNFW39cUNuhSIf6FDbLi_nzsaa800CF";
        $data = array('registration_ids' =>
            $token
        , 'notification' => $notification, 'priority' => 'high');
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
        curl_close($ch);
        dd($result);
        return true;
    }
}