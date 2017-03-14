<?php

/**
 * Created by Nijraj Gelani.
 * Date: 2/25/17
 * Time: 2:32 PM
 */
use Illuminate\Database\Capsule\Manager as Capsule;

class Blog extends Base {
    public static $table = "blog";
    public static $primary_key = "id";
    private static $activeBlog;

    public static function getCurrentBlog(){
        $id = null;
        if(!isset($_GET['blog'])){
            $blog = $_SERVER['HTTP_REFERER'];
            $blog = explode("/", $blog);
            $i = 0;
            while($blog[$i++] != "dashboard");
            $_GET['blog'] = $blog[$i];
        }
        $data = Capsule::table("blog")->where("url", "=", $_GET['blog'])->first();
        if($data == null)
            throw new Exception("Blog not found...");
        $id = $data->id;
        if (Blog::$activeBlog != null) {
            if(Blog::$activeBlog->id == $id){
                return Blog::$activeBlog;
            }else{
                $blog = new Blog($id);
                Blog::$activeBlog = $blog;
                return $blog;
            }
        }else{
            $blog = new Blog($id);
            Blog::$activeBlog = $blog;
            return $blog;
        }
    }

    public function getPostsCount(){
        return Capsule::table("post")->where("blog", "=", $this->id)->count();
    }


    public function getPosts($kind = "published", $page = 1, $posts_per_page = 10){
        if($page == null)
            $result = Capsule::table("post")->where("blog", "=", $this->id)->get()->reverse();
        else
            $result = Capsule::table("post")->where([
                ["blog", "=", $this->id],
                ["published", "=", 1]
            ])->get()->reverse()->forPage($page, $posts_per_page);
        $posts = array();
        foreach ($result as $r){
            $p = new Post(null);
            $p->load($r);
            $posts[] = $p;
        }
        return $posts;
    }

    public function getCategories(){
        // TODO: there should be some method to do this shit in Base
        $result = Capsule::table("category")->where("blog", "=", $this->id)->get();
        $cats = array();
        foreach ($result as $r){
            $c = new Category(null);
            $c->load($r);
            $cats[] = $c;
        }
        return $cats;
    }
}