<?php
/**
 * Created by Nijraj Gelani.
 * Date: 3/11/17
 * Time: 8:54 PM
 */

require ("includes/common.php");

$router = new AltoRouter();

$router->map("GET", "/", "home.php");
$router->map("GET", "/register", "register.php");
$router->map("GET", "/dashboard/", "_dashboard/index.php");

$router->map("GET", "/dashboard/[*:blog]/", function ($blog){
    $_GET['blog'] = $blog;
    require "_dashboard/blog.php";
});

$router->map("GET", "/dashboard/account", function (){
    require "_dashboard/account.php";
});


$router->map("GET", "/dashboard/add-blog", function (){
    require "_dashboard/add_blog.php";
});

$router->map("GET", "/dashboard/[*:blog]/posts", function ($blog){
    $_GET['blog'] = $blog;
    require "_dashboard/posts.php";
});

$router->map("GET", "/dashboard/[*:blog]/delete", function ($blog){
    $_GET['blog'] = $blog;
    require "ajax/delete_blog.php";
});

$router->map("GET", "/dashboard/[*:blog]/posts/page/[i:page]", function ($blog, $page){
    $_GET['blog'] = $blog;
    $_GET['page'] = $page;
    require "_dashboard/posts.php";
});

$router->map("GET", "/dashboard/[*:blog]/posts/add", function ($blog){
    $_GET['blog'] = $blog;
    require "_dashboard/add_post.php";
});

$router->map("GET", "/dashboard/[*:blog]/posts/edit/[i:id]", function ($blog, $id){
    $_GET['blog'] = $blog;
    $_GET['edit'] = $id;
    require "_dashboard/add_post.php";
});

$router->map("GET", "/dashboard/[*:blog]/categories", function ($blog){
    $_GET['blog'] = $blog;
    require "_dashboard/categories.php";
});

$router->map("GET", "/dashboard/[*:blog]/categories/add", function ($blog){
    $_GET['blog'] = $blog;
    require "_dashboard/add_category.php";
});

$router->map("GET", "/dashboard/[*:blog]/categories/edit/[i:id]", function ($blog, $id){
    $_GET['blog'] = $blog;
    $_GET['edit'] = $id;
    require "_dashboard/add_category.php";
});

$router->map("GET", "/dashboard/[*:blog]/settings", function ($blog){
    $_GET['blog'] = $blog;
    require "_dashboard/settings.php";
});


// The one for the blogs
$router->map("GET", "/[*:blog]/", function ($blog){
    $_GET['blog'] = $blog;
    require "includes/functions.php";
    require "blogs/" . $blog . "/index.php";
});

$router->map("GET", "/[*:blog]/page/[i:page]", function ($blog, $page){
    $_GET['blog'] = $blog;
    $_GET['page'] = $page;
    require "includes/functions.php";
    require "blogs/" . $blog . "/index.php";
});

$router->map("GET", "/[*:blog]/post/[*:post]", function ($blog, $post){
    $_GET['blog'] = $blog;
    $_GET['post'] = $post;
    require "includes/functions.php";
    require "blogs/" . $blog . "/post.php";
});

$match = $router->match();

if($match){
    if(is_callable($match['target']))
        call_user_func_array($match['target'], $match['params']);
    else
        require $match['target'];
}else{
    echo "404 dude...";
}