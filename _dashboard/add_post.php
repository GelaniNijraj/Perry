<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perry</title>
    <?php require (ROOT . "/includes/head.php"); ?>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>
    <?php

    if(isset($_GET['edit'])){
        $edit = true;
        $post = new Post($_GET['edit']);
        if($post->author != User::getCurrentUser()->id){
            header("Location: posts");
        }
    }else{
        $edit = false;
        $post = new Post(null);
    }
    ?>
    <div id="wrapper">
        <div class="row">
            <div class="col-6-12"><h1><?=$edit?"Edit post":"New post"?></h1></div>
            <div class="col-6-12" style="text-align: right">
                <?php if($edit){ ?>
                    <input type="submit" class="red" value="Delete Post" onclick="window.location.replace('<?=dashboard('posts/delete/' . $post->id)?>');">
                <?php } ?>
            </div>
        </div>

        <form method="post" id="addPostForm">
            <div class="row">
                <div class="col-12-12">
                    <input type="hidden" name="edit" value="<?=$_GET['edit']?>">
                    <input type="text" name="title" placeholder="Post Title" value="<?=$post->title?>" style="font-size: 25px;" />
                    <div class="row">
                        <div class="col-4-12">
                            <span class="error"><?php echo ROOT_URL . "/" . Blog::getCurrentBlog()->url . "/post/"; ?></span>
                        </div>
                        <div class="col-8-12">
                            <input type="text" placeholder="Slug" name="slug" value="<?=$post->slug?>">
                        </div>
                    </div>
                    <textarea style="margin: 10px 0px; padding: 10px;" name="content" placeholder="Post Content" rows="10"><?=$post->content?></textarea>
                    <label> Select a category :<?php
                        $cats = Blog::getCurrentBlog(); ?>
                        <select style="width: 300px;" name="category">
                            <?php
                                $cats = Blog::getCurrentBlog()->getCategories();
                                foreach ($cats as $c) {
                                    echo "<option value='" . $c->id . "' ";
                                    if($edit && $c->id == $post->category)
                                        echo "selected";
                                    echo ">" . $c->name . "</option>";
                                }
                            ?>
                        </select>
                    </label>
<!--                    <div class="row" style="margin-top: 20px;">-->
<!--                        <label>Select a cover image :-->
<!--                            <input type="file" />-->
<!--                        </label>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="row">
                <div class="col-12-12">
                    <input type="submit" value="<?=$edit?"Save Post":"Publish Post"?>" class="green">
                    <input type="button" value="Discard" class="red" onclick="window.location.replace('/dashboard/<?=Blog::getCurrentBlog()->url?>/posts');">
                    <span id="addPostOutput" class="error"></span>
                </div>
            </div>
        </form>
    </div>

    <?php require (ROOT . "/includes/footer.php"); ?>

    <script>
        $("#addPostForm").ajaxForm({
            url: "/ajax/add_post.php",
            target: addPostOutput
        });
    </script>
</body>
</html>