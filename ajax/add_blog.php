<?php
/**
 * Created by Nijraj Gelani.
 * Date: 3/5/17
 * Time: 5:49 PM
 */

require ("../includes/common.php");

use Respect\Validation\Validator as v;


if(isset($_POST['title']) && isset($_POST['description'])){
    $validator = v::length(1, 255);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    if($validator->validate($title) && $validator->validate($description)){
        if(v::slug()->validate($url)) {
            // Creating the blog
            $blog = new Blog();
            $blog->title = $title;
            $blog->description = $description;
            $blog->url = $url;
            $blog->user = User::getCurrentUser()->id;
            $blog->created_on = \Carbon\Carbon::now();
            if ($blog->save()) {
                // Creating default category
                $category = new Category();
                $category->name = "Default Category";
                $category->blog = $blog->id;
                if ($category->save()) {
                    // Creating default post
                    $post = new Post();
                    $post->author = User::getCurrentUser()->id;
                    $post->blog = $blog->id;
                    $post->title = "Hello, World!";
                    $post->slug = "hello-world";
                    $post->content = "Perry's default template uses the Github flavoured markdown. Here's a quick cheatsheet of it.

#### Headings

    # Heading 1
    ## Heading 2
    ### Heading 3
    #### Heading 4
    ##### Heading 5
    ###### Heading 6

#### Lists

    * Item 1
    * Item 2
    * Item 3

    1. Item 1
    2. Item 2
    3. Item 3

#### Links

`[This is a link](http://your-website.com)`

#### Tables
    |         Col 1       |         Col 2       |
    |---------------------|---------------------|
    |  data here          |   data here         |";
                    $post->published = 1;
                    $post->category = $category->id;
                    $post->published_on = \Carbon\Carbon::now();
                    if($post->save()){
                        rcopy(ROOT . "/themes/default", ROOT . "/blogs/" . $blog->url);
                        echo "<script>window.location.replace('/dashboard/" . $blog->url . "/');</script>";
                    }else{
                        echo "Something went wrong...";
                    }
                }else {
                    echo "Something went wrong...";
                }
            } else {
                echo "Something went wrong...";
            }
        }else{
            echo "Please enter a proper URL...";
        }
    }else{
        echo "Please complete all the fields...";
    }
}