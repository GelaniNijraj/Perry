<?php
/**
 * Created by Nijraj Gelani.
 * Date: 4/11/17
 * Time: 6:20 PM
 */


try {
    if (!isset($_GET['category']))
        throw new Exception();
    // If the last category then don't delete it
    if (count(Blog::getCurrentBlog()->getCategories()) < 2)
        throw new Exception("Last remaining category cannot be deleted");

    $category = new Category($_GET['category']);

    // deleting someone else's stuff!
    if($category->blog != Blog::getCurrentBlog()->id)
        throw new Exception("Something went wrong...");

    // Change old categories to something else
        Post::fallbackCategory($category->id);
    // and delete it
        $category->delete();
    header("Location: " . dashboard("categories"));
}catch (Exception $e){
    header("Location: " . dashboard("categories"));
}