<?php
namespace auth;
use database\database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class auth
{
    protected function redirect($url){
        header('location: '.trim(current_domain,"/ ")."/".$url);
        exit();
    }
    protected function redirectback(){
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit();
    }
    protected function hashPassword($pass){
        return password_hash($pass,PASSWORD_DEFAULT);
    }
    protected function sendMail($emailAddress, $subject, $body){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->CharSet = "UTF-8"; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = MAIL_HOST; //Set the SMTP server to send through
            $mail->SMTPAuth = SMTP_AUTH; //Enable SMTP authentication
            $mail->Username = MAIL_USERNAME; //SMTP username
            $mail->Password = MAIL_PASSWORD; //SMTP password
            $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
            $mail->Port = MAIL_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(SENDER_MAIL, SENDER_NAME);
            $mail->addAddress($emailAddress);


            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
             $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    protected function showpage($src,$title,$parametrs=null){
        require_once base_path."/templates/auth/head.php";
        require_once base_path."/templates/auth/".$src;
        require_once base_path."/templates/auth/script.php";
    }
    public  function isAdmin(){
        if (isset($_SESSION['user'])){
            $db=new database();
            $user=$db->select("select * from users where id=?",[$_SESSION['user']])->fetch();
            if ($user['permission']==0){
            return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    public function get_user_data(){
        if (isset($_SESSION['user'])){
            $db=new database();
            $user=$db->select("select * from users where id=?",[$_SESSION['user']])->fetch();
            if($user){
                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    protected function saveimage($image,$imagepath){
        $extention=explode("/",$image['type'])[1];
        $imagename=date("Y-m-d-H-i-s").".".$extention;
        $imagetemp=$image['tmp_name'];
        $imagepath="public/".$imagepath."/";

        if (is_uploaded_file($imagetemp)){
            if (move_uploaded_file($imagetemp,$imagepath.$imagename)){
                return $imagepath.$imagename;
            }
        }
        return false;
    }
}