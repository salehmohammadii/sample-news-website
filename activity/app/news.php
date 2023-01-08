<?php

namespace app;

use auth\auth;
use database\database;

class news extends home
{
    public function index()
    {
        $db = new database();
        $popular_posts=$this->get_popular_post($db);
        $latest_posts=$this->get_latest_post($db);
        $breaking_news=$this->get_breaking_news($db);
        $parametrs=array_merge($this->get_header_footer_parametrs($db),['popular_post'=>$popular_posts,'latest_post'=>$latest_posts,'breaking_news'=>$breaking_news]);
        $this->showpage("index.php", "سایت خبری", $parametrs);
    }

    public function post_view($id){
        $db=new database();
        $parametrs=$this->get_header_footer_parametrs($db);
        $post=$this->get_post($db,$id);
        $db->update("posts",['view'],[$post['view']+1],"id",$id);
        $comment=$this->get_post_comment($db,$id);
        $parametrs=array_merge($parametrs,['post'=>$post,"comment"=>$comment]);
        $this->showpage("post.php", "سایت خبری",$parametrs);

    }
    public function comment_store($request,$post_id,$user_id){
        $db=new database();
        $db->create('comment',['user_id','post_id','comment'],[$user_id,$post_id,$request['comment']]);
        $this->redirectback();
    }
    public function category_search($category){
        $category=urldecode($category);
        $db=new database();
        $breaking_news=$this->get_breaking_news($db);
        $parametrs=$this->get_header_footer_parametrs($db);
        $posts=$this->search_category($category,$db);
        $parametrs=array_merge($parametrs,["posts"=>$posts,"breaking_news"=>$breaking_news]);
        $this->showpage("category.php",$category,$parametrs);
    }


}