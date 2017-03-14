<?php
/**
 * Created by Nijraj Gelani.
 * Date: 3/7/17
 * Time: 7:11 PM
 */

require ("../includes/common.php");

if(isset($_POST['name'])){
    if(isset($_POST['edit'])) {
        $category = new Category($_POST['edit']);
        if($category->blog != Blog::getCurrentBlog()->id)
            $category = new Category();
    }else
        $category = new Category();
    $category->name = $_POST['name'];
    $category->blog = Blog::getCurrentBlog()->id;
    if($category->save())
        echo "<script>window.location.replace('/dashboard/" . Blog::getCurrentBlog()->url . "/categories');</script>";
    else
        echo "Something went wrong...";
}else{
    echo "Something went wrong...";
}