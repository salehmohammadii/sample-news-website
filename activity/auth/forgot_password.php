<?php


namespace auth;


use database\database;

class forgot_password extends auth
{
    public function index(){
        $this->showpage("forgot_password.php","forgot password");
    }
    public function send_email($request){
        $db = new database();
        $email = $db->select("select * from users where email=?", [$request['email']])->fetch();
        if ($email) {
            $verify_token = bin2hex(openssl_random_pseudo_bytes(32));
            $result = $db->update("users", ["verify_token"], [$verify_token], "id", $email['id']);
            if ($result) {
                $this->sendMail($request['email'], "تغییر رمز عبور", $this->forgotemailbody($verify_token));
                $this->redirect("auth/login");
            }else{
                flash("forgot_error","ارسال ایمیل تایید ممکن نیست بعدا تلاش کنید");
                $this->redirectback();
            }
        }else{
            flash("forgot_error","ایمیل صحیح نیست");
            $this->redirectback();
        }
}
private function forgotemailbody($verify_token){
    return "<h1> تایید ایمیل جهت تغییر رمز عبور</h1>
<br>
<div><a href='".url("forgot-password/$verify_token")."'>active profile </a> </div>";
}
public function reset_password($verify_token){
    $db = new database();
    $user = $db->select("select * from users where verify_token=?", [$verify_token])->fetch();
    if ($user){
        $this->showpage("reset_password.php","reset",$verify_token);
    }else{
        flash("forgot_error","توکن معتبر نیست.");
        $this->redirect("auth/forgot-password");
    }
}
public function store($request,$verify_token){
    $db = new database();
    $user = $db->select("select * from users where verify_token=?", [$verify_token])->fetch();
    if ($user){
        if (strlen($request['password'])<8){
            flash("forgot_error","پسوورد باید بیشتر از 8 رقم باشد.");
            $this->redirectback();
        }else{
            $password=$this->hashPassword($request['password']);
            $db->update("users",["password","verify_token"],[$password,"null"],"verify_token",$verify_token);
            $this->redirect("auth/login");
        }
    }else{
        flash("forgot_error","توکن معتبر نیست.");
        $this->redirect("auth/forgot-password");
    }
}

}