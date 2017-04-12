<?php
/**
 * Created by Nijraj Gelani.
 * Date: 4/11/17
 * Time: 6:20 PM
 */


try {
    if (!isset($_GET['blog']))
        throw new Exception();

    $blog = Blog::getCurrentBlog();

    // deleting someone else's stuff!
    if($blog->user != User::getCurrentUser()->id)
        throw new Exception("Something went wrong...");

    // Do cleanup shit
    Post::deleteByBlog($blog->id);
    Category::deleteByBlog($blog->id);
    rrmdir(ROOT . '/blogs/' . $blog->url);

    // pull the motha fuken plug
        $blog->delete();
    header("Location: /dashboard/");
}catch (Exception $e){
    header("Location: /dashboard/");
}