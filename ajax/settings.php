<?php
/**
 * Created by Nijraj Gelani.
 * Date: 3/10/17
 * Time: 9:27 PM
 */

require ("../includes/common.php");

use Respect\Validation\Validator as v;
use Illuminate\Database\Capsule\Manager as Capsule;

$title = $_POST['title'];
//$url = $_POST['url'];
$url = "slug";
$description = $_POST['description'];
$headline = $_POST['headline'];
$footer = $_POST['footer'];
$posts_per_page = $_POST['posts_per_page'];
$theme = $_POST['theme'];

try{
    v::length(1, 255)->setName("Blog title")->check($title);
    v::slug()->length(1, 255)->setName("Blog URL")->check($url);
    v::length(1, 255)->setName("Blog description")->check($description);
    v::length(1, 255)->setName("Headline")->check($headline);
    v::length(1, 255)->setName("Footer")->check($footer);
    v::numeric()->setName("Posts per page")->check($posts_per_page);

    $blog = Blog::getCurrentBlog();
    $url = $blog->url;
    if($url != $blog->url && Blog::cexists("url", $url))
        throw new Exception("URL already in use");
    if($blog->theme != $theme){
        $theme = new Theme($theme);
        rrmdir(ROOT . "/blogs/" . $url);
        rcopy(ROOT . "/themes/" . $theme->directory, ROOT . "/blogs/" . $url);
        $blog->theme = $theme;
    }
    $blog->load($_POST);

    if($blog->save())
        echo "Settings saved successfully...";
    else
        throw new Exception("Something went wrong...");
}catch (Exception $e){
    print_r($e->getMessage());
}