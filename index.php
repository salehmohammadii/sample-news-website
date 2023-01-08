<?php
session_start();


//config
define("base_path",__DIR__);
define("current_domain",current_domain()."");
define("desplay_error",true);
define("db_host",'localhost');
define("db_name","project");
define("db_username","root");
define("db_password","");


//mail
define('MAIL_HOST', 'smtp.gmail.com');
define('SMTP_AUTH', true);
define('MAIL_USERNAME', 'salehmohammadi475@gmail.com');
define('MAIL_PASSWORD', 'mnmosfxzdegeycmz');
define('MAIL_PORT', 587);
define('SENDER_MAIL', 'salehmohammadi475@gmail.com');
define('SENDER_NAME', 'وبسایت خبری');


//notif
define('SERVER-KEY','');



//admin
require_once "database\database.php";
require_once "activity/admin/admin.php";
require_once "activity/admin/Category.php";
require_once "activity/admin/post.php";
require_once "activity/admin/banner.php";
require_once "activity/admin/comment.php";
require_once "activity/admin/user.php";
require_once "activity/admin/menue.php";
require_once "activity/admin/web_settings.php";
require_once "activity/admin/dashboard.php";

//auth
require_once "activity/auth/auth.php";
require_once "activity/auth/register.php";
require_once "activity/auth/login.php";
require_once "activity/auth/forgot_password.php";

//ap
require_once "activity/app/home.php";
require_once "activity/app/news.php";
require_once "activity/app/notification.php";
require_once "activity/app/notification.php";

require_once "lib/Parsidev/Jalali/jDate.php";
require_once "lib/Parsidev/Jalali/jDateTime.php";


//phpmailer
require 'lib/PHPMailer/PHPMailer/Exception.php';
require 'lib/PHPMailer/PHPMailer/PHPMailer.php';
require 'lib/PHPMailer/PHPMailer/SMTP.php';

//
spl_autoload_register(function ($classname){
   $path=base_path.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR;
   include $path.$classname.'.php';
});



//helpers
function toShamsi($date){
return \Parsidev\Jalali\jDate::forge($date)->format('datetime');
}


function protocol(): string
{
    return stripos($_SERVER['SERVER_PROTOCOL'],"HTTPS")===true ? 'https://':'http://';
}


function current_domain(): string
{
  return protocol().$_SERVER['HTTP_HOST'];
}


function assets($src){

    return trim(current_domain,"/ ")."/".trim($src,"/");
}
function url($src){
    return trim(current_domain,"/ ")."/".trim($src,"/");
}
function curent_url(){
    return current_domain().$_SERVER['REQUEST_URI'];
}
function request_method(){
    return $_SERVER['REQUEST_METHOD'];
}
function display_error($display_error){
    if ($display_error){
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
    }else{
        ini_set('display_errors',0);
        ini_set('display_startup_errors',0);
        error_reporting(0);
    }
}


global $flashMessage;
if(isset($_SESSION['flash_message'])){
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}


function flash($name, $value = null)
{
    if($value === null){
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
        return $message;
    }
    else{
        $_SESSION['flash_message'][$name] = $value;
    }

}
function uri($reservedUrl,$class,$method,$requestMethod="GET"){
    $curentUrl=explode("?",curent_url())[0];
    $curentUrl=str_replace(current_domain,"",$curentUrl);
    $curentUrl=trim($curentUrl,"/");
    $curentUrl=explode("/",$curentUrl);
    $curentUrl=array_filter($curentUrl);


    $reservedUrl=trim($reservedUrl,"/");
    $reservedUrl=explode("/",$reservedUrl);
    $reservedUrl=array_filter($reservedUrl);
    if (sizeof($curentUrl)!= sizeof($reservedUrl) or request_method()!=$requestMethod){
        return false;
    }
    $parameters=[];
    for ($i=0;$i<sizeof($reservedUrl);$i++){
if($reservedUrl[$i][0]=="{" and $reservedUrl[$i][strlen($reservedUrl[$i])-1]=="}"){
    array_push($parameters,str_replace(["{","}"],"",$curentUrl[$i]));
}elseif ($reservedUrl[$i]!==$curentUrl[$i]){
    return false;
}
    }
if ($requestMethod==="POST"){
    $request=isset($_FILES)?array_merge($_FILES,$_POST):$_POST;
    $parameters=array_merge([$request],$parameters);
}
$object=new $class;
call_user_func_array(array($object,$method),$parameters);

exit();
}


function dd($var){
    echo "<pre>";
    var_dump($var);
    exit();
}
$db=new \database\database();

//admin

//dashboard
uri("admin","admin\dashboard","index");

//category
uri("admin/category","admin\category","index");
uri("admin/category/create","admin\category","create");
uri("admin/category/store","admin\category","store","POST");
uri("admin/category/edit/{id}","admin\category","edit");
uri("admin/category/update/{id}","admin\category","update","POST");
uri("admin/category/delete/{id}","admin\category","delete");
//post
uri("admin/post","admin\post","index");
uri("admin/post/create","admin\post","create");
uri("admin/post/store","admin\post","store","POST");
uri("admin/post/edit/{id}","admin\post","edit");
uri("admin/post/update/{id}","admin\post","update","POST");
uri("admin/post/delete/{id}","admin\post","delete");
uri("admin/post/change_selected/{id}","admin\post","change_selected");
uri("admin/post/change_breaking_news/{id}","admin\post","change_breaking_news");

//banner
uri("admin/banner","admin\banner","index");
uri("admin/banner/create","admin\banner","create");
uri("admin/banner/store","admin\banner","store","POST");
uri("admin/banner/edit/{id}","admin\banner","edit");
uri("admin/banner/update/{id}","admin\banner","update","POST");
uri("admin/banner/delete/{id}","admin\banner","delete");

//comment
uri("admin/comment","admin\comment","index");
uri("admin/comment/not-approved/{id}","admin\comment","not_approved");
uri("admin/comment/approved/{id}","admin\comment","approved");

//user
uri("admin/user","admin\user","index");
uri("admin/user/edit/{id}","admin\user","edit");
uri("admin/user/update/{id}","admin\user","update","POST");
uri("admin/user/delete/{id}","admin\user","delete");
uri("admin/user/set-user/{id}","admin\user","set_user");
uri("admin/user/set-admin/{id}","admin\user","set_admin");

//menue
uri("admin/menue","admin\menue","index");
uri("admin/menue/create","admin\menue","create");
uri("admin/menue/store","admin\menue","store","POST");
uri("admin/menue/edit/{id}","admin\menue","edit");
uri("auth/register",'auth\register',"index");
uri("admin/menue/delete/{id}","admin\menue","delete");
uri("admin/menue/change_selected/{id}","admin\menue","change_selected");
uri("admin/menue/change_breaking_news/{id}","admin\menue","change_breaking_news");

//web_settings
uri("admin/web_settings","admin\web_settings","index");
uri("admin/web_settings/create","admin\web_settings","create");
uri("admin/web_settings/store","admin\web_settings","store","POST");
uri("admin/web_settings/edit","admin\web_settings","edit");
uri("admin/web_settings/update","admin\web_settings","update","POST");
uri("admin/web_settings/delete/{id}","admin\web_settings","delete");


//auth
//register
uri("auth/register",'auth\register',"index");
uri("auth/register/store",'auth\register',"store","POST");

//activation
uri("activation/{verify_token}",'auth\register',"activation");

//login
uri("auth/login",'auth\login',"index");
uri("auth/login/login-check",'auth\login',"loginCheck","POST");


//forgot password
uri("auth/forgot-password",'auth\forgot_password',"index");
uri("auth/forgot-password/send-email",'auth\forgot_password',"send_email","POST");
uri("forgot-password/{verify_token}",'auth\forgot_password',"reset_password");
uri("auth/reset-password/store/{verify_token}",'auth\forgot_password',"store","POST");
uri("auth/log-out",'auth\login',"log_out");

//app
uri("home",'app\news',"index");
uri("/",'app\news',"index");
uri("home/post/{id}",'app\news',"post_view");
uri("home/comment/store/{post_id}/{user_id}",'app\news',"comment_store","POST");
uri("home/category/{category}",'app\news',"category_search");

//notification
uri("/notification/set-token/{token}",'app\notification',"token_store");

echo "404 not found";