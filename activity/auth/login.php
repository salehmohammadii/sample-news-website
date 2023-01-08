<?php


namespace auth;


use database\database;

class login extends auth
{
    public function index(){
        $this->showpage("login.php","login");
    }
    public function loginCheck($request){
        if (empty($request['email']) or empty($request['password'])){
            flash("login_error","پسورد یا ایمیل نمیتواند خالی باشد");
            $this->redirectback();
        }else{
            $db=new database();
            $user=$db->select("select * from users where email=?",[$request['email']])->fetch();
            if ($user and password_verify($request['password'],$user['password'])){
                $_SESSION['user'] = $user['id'];
                if($user['permission']){
                    $this->redirect("admin");
                }else{
                    $this->redirect("home");
                }
            }else{

                flash("login_error","اطلاعات وارد شده صحیح نیست");
                $this->redirectback();
            }
        }
    }
    public function log_out(){
        if (isset($_SESSION['user'])){
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect("home");
    }

}