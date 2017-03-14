<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/26/17
 * Time: 1:02 AM
 */

require ("../includes/common.php");

if(isset($_POST['title']) && isset($_POST['content'])){
    if(strlen($_POST['title']) > 0 && strlen($_POST['content']) > 0){
        if(isset($_POST['edit'])) {
            $post = new Post($_POST['edit']);
            if($post->author != User::getCurrentUser()->id)
                $post = new Post();
        }else
            $post = new Post();
        $post->title = $_POST['title'];
        $post->slug = $_POST['slug'];
        $post->content = $_POST['content'];
        $post->author = User::getCurrentUser()->id;
        $post->category = $_POST['category'];
        $post->published_on = \Carbon\Carbon::now();
        $post->blog = Blog::getCurrentBlog()->id;
        if($post->save()){
//            echo "<script>window.location.replace('/dashboard/" . Blog::getCurrentBlog()->url . "/posts');</script>";
            echo "Post saved successfully...";
        }else{
            echo "Something went wrong. Please try again...";
        }
    }else{
        echo "Please add a title and content...";
    }
}else{
    echo "Something went wrong...";
}
