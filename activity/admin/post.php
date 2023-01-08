<?php


namespace admin;

use app\notification;
use database\database;
class post extends admin
{
    public function index(){
        $db=new database();
        $parametrs=$db->select("select posts.id,posts.title,posts.summary,posts.body,posts.image,posts.cat_id
,posts.status,posts.breaking_news,posts.selected,posts.user_id,posts.view,
       users.id as userId,users.name as userName,category.id as categoryID,category.name as categoryName
    from posts join category on cat_id=category.id join users on user_id=users.id order by id desc");

        $this->showpage("posts/index.php","Posts",$parametrs);
    }
    public function create(){
        $db=new database();
        $parametrs=$db->select("select * from category order by id desc");
        $this->showpage("posts/create.php","Create Posts",$parametrs);

    }
    public function store($request){

        $request['image']=$this->saveimage($request['image'],"post-image");
        if ($request['image']){
            $request=array_merge($request,["user_id"=>$_SESSION['user']]);
            $db=new database();
            $db->create("posts",array_keys($request),$request);
            $notification=new notification();
            $notification->send_notification($request['title'],$request['summary']);
        }
        $this->redirect("admin/post");
    }
    public function change_selected($id){
        $db=new database();
        $selected=$db->select("select selected from posts where id=?",[$id])->fetch()['selected'];
        $selected=($selected==true)?false:1;

        $db->update("posts",["selected"],[$selected],"id",$id);
        $this->redirect("admin/post");
    }
    public function change_breaking_news($id){
        $db=new database();
        $breaking_news=$db->select("select breaking_news from posts where id=?",[$id])->fetch()['breaking_news'];
        $breaking_news=($breaking_news==true)?false:1;

        $db->update("posts",["breaking_news"],[$breaking_news],"id",$id);
        $this->redirect("admin/post");
    }
    public function delete($id){
        $db=new database();
        $image=$db->select("select image from posts where id=?",[$id])->fetch();
        $this->deleteimage($image['image']);
        $db->delete("posts","id",$id);
        $this->redirect("admin/post");
    }
    public function edit($id){
        $db=new database();
        $categories=$db->select('select * from category');
        $posts=$db->select('select * from posts where id=?',[$id])->fetch();
        $parametrs=array_merge(["category"=>$categories],["posts"=>$posts]);
        $this->showpage("posts/edit.php","Edit Post",$parametrs);
    }
    public function update($request,$id){
        $request['published_at']=date("Y-m-d H-i-s",(int)substr($request['published_at'],0,10));
        $db=new database();

        if ($request['image']['name']){
            $imagePath=$db->select('select image from posts where id=?',[$id])->fetch()['image'];
            $this->deleteimage($imagePath);
            $request['image']=$this->saveimage($request['image'],"post-image");
            if ($request['image']){
                $db->update("posts",array_keys($request),$request,"id",$id);
            }
        }else{
            unset($request['image']);
            $db->update("posts",array_keys($request),$request,"id",$id);
        }
        $this->redirect("admin/post");
    }
}