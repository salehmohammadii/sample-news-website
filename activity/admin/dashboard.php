<?php


namespace admin;


use database\database;

class dashboard extends admin
{
    public function index(){
        $db=new database();
        $stats=$db->select("SELECT  (
            SELECT COUNT(*)
            FROM   users
        ) AS allusercount,
        (
            SELECT COUNT(*)
            FROM   category
        ) AS categorycount,
        (
            SELECT COUNT(*)
            FROM  posts
        ) AS postscount,
        (
            SELECT COUNT(*)
            FROM   comment
        ) AS commentcount,
        (
            SELECT COUNT(*)
            FROM   users where permission=0
        ) AS usercount,
        (
            SELECT COUNT(*)
            FROM   users where permission=1
        ) AS admincounts,
       (
            SELECT sum(view)
            FROM  posts
        ) AS postsview,
        (
            SELECT COUNT(*)
            FROM   comment where status='unseen'
        ) AS unseencount,
       (
            SELECT count(*)
            FROM  comment where status='approved'
        ) AS approvedcount
FROM    dual")->fetch();
        $most_viewed_posts=$db->select("select * from posts order by view desc limit 10");
        $most_commented_post=$db->select("select count(*) as count,post_id,posts.title  
        from comment left join posts on comment.post_id=posts.id 
        group by post_id order by count desc limit 10");
        $comments=$db->select("select username,comment,status,comment.id from comment left join users on comment.user_id = users.id order by comment.id desc limit 10");
$parametrs=["stats"=>$stats,"most_viewd_posts"=>$most_viewed_posts,"comments"=>$comments,"most_commented_posts"=>$most_commented_post];
        $this->showpage("dashboard\index.php","admin",$parametrs);
    }
}