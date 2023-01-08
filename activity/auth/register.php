<?php


namespace auth;


use database\database;

class register extends auth
{
    public function index(){
        $this->showpage("register.php","register");
    }
    protected function registermailbody($verify_token){
        return "<h1> تایید ایمیل جهت ثبت نام</h1>
<br>
<div><a href='".url("activation/$verify_token")."'>active profile </a> </div>";
    }

    public function store($request)
    {
        $db = new database();
        $email = $db->select("select * from users where email=?", [$request['username']])->fetch();
        $username = $db->select("select * from users where username=?", [$request['account-name']])->fetch();
        if (strlen($request['password']) < 8) {
            flash("register_error", "طول پسورد باید بیشتر از 8 رقم باشد.");
            $this->redirectback();
        } elseif ($email !== false) {
            flash("register_error", "ایمیل تکراری است در صورت فراموشی رمز عبور بر روی فراموشی رمز کلیک کنید");
            $this->redirectback();
        } elseif ($username != false) {
            flash("register_error", "یوزرنیم تکراری است یوزرنیم دیگری را امتحان کنید");
            $this->redirectback();
        } elseif (!filter_var($request['username'], FILTER_VALIDATE_EMAIL)) {
            flash("register_error", "ایمیل وارد شده صحیح نیست.");
            $this->redirectback();
        } else {
            if ($request['image']['tmp_name']!=""){
                $request['image']= $this->saveimage($request['image'],"user-image");
            }else{
                $request['image']="null";
            }
            $verify_token = bin2hex(openssl_random_pseudo_bytes(32));
            $request = ["email" => $request['username'], "username" => $request['account-name'], "password" =>
                $this->hashPassword($request['password']), "verify_token" => $verify_token, "is_active" => 0,"image"=>$request['image']
            ,'name'=>$request['name'],'family'=>$request['family']];
            $result = $db->create("users", array_keys($request), $request);
            if ($result) {
                $this->sendMail($request['email'], "تایید ایمیل", $this->registermailbody($verify_token));
            }
        }
        $this->redirect("home");
    }


        public function activation($verify_token){
            $db=new database();
            $user=$db->select("select * from users where verify_token=? and is_active=0",[$verify_token])->fetch();
            if ($user===null){
                $this->redirect("auth/login");
            }else{
                $db->update("users",["is_active",'verify_token'],[1,"null"],"id",$user['id']);
                $this->redirect("auth/login");
            }
        }
}