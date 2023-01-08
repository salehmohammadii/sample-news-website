<?php

namespace app;

use auth\auth;

class home
{

    protected function redirect($url)
    {
        header('location: ' . trim(current_domain, "/ ") . "/" . $url);
        exit();
    }

    protected function redirectback()
    {
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    protected function showpage($src, $title, $parametrs = null)
    {
        require_once base_path . "/templates/app/layouts/header.php";
        require_once base_path . "/templates/app/" . $src;
        require_once base_path . "/templates/app/layouts/footer.php";

    }

    protected function get_most_commented_post($db)
    {
        return $db->select("select posts.*,count(comment.id) as comment,comment.id as commentid,users.name as name,users.
            family as family,category.name as category
            from posts
            left join comment on posts.id = comment.post_id
            left join users on posts.user_id=users.id
            left join category on posts.cat_id=category.id
            group by posts.id
            order by comment desc limit 4")->fetchAll();
    }

    protected function get_popular_post($db)
    {
        return $db->select("select posts.*,count(comment.id) as comment,comment.id as commentid,users.name as name,users.
        family as family,category.name as category
        from posts
        left join comment on posts.id = comment.post_id
        left join users on posts.user_id=users.id
        left join category on posts.cat_id=category.id
        group by posts.id
        order by posts.view desc limit 3")->fetchAll();
    }

    protected function get_banners($db)
    {
        return $db->select("select * from banner order by created_at limit 3")->fetchAll();
    }

    protected function get_latest_post($db)
    {
        return $db->select("select posts.*,count(comment.id) as comment,comment.id as commentid,
        users.name as name,users.family as family,category.name as category
        from posts
        left join comment on posts.id = comment.post_id
        left join users on posts.user_id=users.id
        left join category on posts.cat_id=category.id
        group by posts.id
        order by posts.updated_at desc limit 4")->fetchAll();
    }

    protected function get_menues($db)
    {
        return $db->select("select * from menue")->fetchAll();
    }

    protected function get_selected_posts($db)
    {
        return $db->select("select posts.*,count(comment.id) as comment,comment.id as commentid,users.name as name,users.
        family as family,category.name as category
        from posts
        left join comment on posts.id = comment.post_id
         left join users on posts.user_id=users.id
         left join category on posts.cat_id=category.id
         where posts.selected=1
         group by posts.id limit 4")->fetchAll();
    }

    protected function get_breaking_news($db)
    {
        $breaking_news= $db->select("select posts.title,posts.id from posts 
        where breaking_news=1 order by updated_at desc limit 1")->fetch();
        return $breaking_news;
    }

    protected function get_settings($db)
    {
        return $db->select("select * from settings")->fetch();
    }

    protected function get_most_viewed_posts($db)
    {
        return $db->select("select * from posts order by view desc limit 5")->fetchAll();
    }

    protected function get_header_footer_parametrs($db)
    {
        $auth = new auth();
        $user = $auth->get_user_data();
        $parametrs = ['settings' => $this->get_settings($db), 'user' => $user, 'menues' => $this->get_menues($db), 'banners' => $this->get_banners($db)
            , 'selected_news' => $this->get_selected_posts($db), 'most_commented' => $this->get_most_commented_post($db),
            'most_viewd_posts' => $this->get_most_viewed_posts($db)];
        return $parametrs;
    }

    protected function get_post($db, $post_id)
    {
        $post = $db->select("select posts.*,users.users.name as name,users.
            family as family,category.name as category
            from posts
            left join users on posts.user_id=users.id
            left join category on posts.cat_id=category.id
            where posts.id=?
            group by posts.id",[$post_id])->fetch();
        return $post;
    }
    protected function get_post_comment($db,$post_id){
        $comments = $db->select("select user.*,comment.comment,comment.status,comment.created_at as Cdate
        from
         comment left join users user on comment.user_id = user.id
         where comment.post_id=? and comment.status='approved'",[$post_id])->fetchAll();
        return $comments;
    }
    protected function search_category($category,$db){
        $category=$db->select("select posts.*,count(comment.id) as comment,comment.id as commentid,users.name as name,users.
        family as family,category.name as category
        from posts
        left join comment on posts.id = comment.post_id
         left join users on posts.user_id=users.id
         left join category on posts.cat_id=category.id
         where category.name=?
         group by posts.id limit 15",[$category])->fetchAll();
        return $category;
    }


}