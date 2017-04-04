<?php
/**
 * Created by Nijraj Gelani.
 * Date: 3/6/17
 * Time: 10:09 PM
 */

function blog_url(){
    return $_GET['blog'];
}

if(isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;

$perry_blog = Blog::get("url", $_GET['blog']);

if(!isset($_GET['post']))
    $perry_posts = $perry_blog->getPosts(null, $page, $perry_blog->posts_per_page);
else{
    $perry_post = new Post();
    $perry_post->load(Illuminate\Database\Capsule\Manager::table("post")->where([
        ["slug", "=", $_GET['post']],
        ["blog", "=", $perry_blog->id]
    ])->first());
}

function get_url($file){
    return ROOT_URL . "/blogs/" . blog_url() . "/" . $file;
}

function get_home_url($path_to = ""){
    return ROOT_URL . "/" . $_GET['blog'] . "/" . $path_to;
}

function parse_markdown($str){
    $parser = new \cebe\markdown\GithubMarkdown();
    $parser->enableNewlines = true;
    return $parser->parse($str);
}


function get_excerpt($str, $len = 120){
    $parser = new \cebe\markdown\GithubMarkdown();
    $parsed = $parser->parse($str);
    $not_html = strip_tags($parsed);
    $excerpt = substr($not_html, 0, 120);
    if(strlen($not_html) > $len)
        $excerpt .= "...";

    return $excerpt;
}

function get_total_pages($blog){
    return ceil($blog->getPostsCount() / $blog->posts_per_page);
}

function get_current_page(){
    return $_GET['page'] ?? 1;
}

function to_ago($time){
    return \Carbon\Carbon::parse($time)->diffForHumans();
}