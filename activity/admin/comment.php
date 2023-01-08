<?php


namespace admin;


use database\database;

class comment extends admin
{
    public function index(){
        $db=new database();
        $parametrs=$db->select("select posts.id as postId,posts.title as postTitle,
        users.id as userId,users.name as userName,comment.id as commentId,comment.comment
        ,comment.user_id,comment.status
        from posts
        join comment on comment.post_id=posts.id
        join users on comment.user_id = users.id order by comment.status desc");
        $this->showpage("comments/index.php","Comments",$parametrs,);
        $db->update("comment",['status'],['seen'],"status",'unseen');
    }
    public function approved($id){
        $db=new database();
        $db->update("comment",['status'],['approved'],'id',$id);
        $this->redirect("admin/comment");

    }
    public function not_approved($id){
        $db=new database();
        $db->update("comment",['status'],['seen'],'id',$id);
        $this->redirect("admin/comment");
    }
}