<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?=Blog::getCurrentBlog()->title;?></title>
    <?php require (ROOT . "/includes/head.php"); ?>
    <style>
        p{
            margin-top: 10px;
            text-indent: 10px;
        }
        .block{
            background: #F3F3F3;
            height: 150px;
        }
        .block > h1{
            text-align: center;
        }
        .block > p{
            text-align: center;
            width: 100%;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php require (ROOT . "/includes/menu.php"); ?>
<div id="wrapper">
    <h1><?=Blog::getCurrentBlog()->title;?></h1>
    <h2>Status at glance</h2>
    <div class="row">
        <div class="col-4-12">
            <div class="block hover">
                <p><img src="/images/posts.png" /></p>
                <h1><?=Blog::getCurrentBlog()->getPostsCount()?> Posts</h1>
            </div>
        </div>
        <div class="col-4-12">
            <div class="block hover">
                <p><img src="/images/category.png" /></p>
                <h1><?=count(Blog::getCurrentBlog()->getCategories())?> Categories</h1>
            </div>
        </div>
        <div class="col-4-12">
            <div class="block hover">
                <p><img src="/images/theme.png" /></p>
                <h1><?=Illuminate\Database\Capsule\Manager::table("theme")->where("id", "=", Blog::getCurrentBlog()->theme)->first()->name?></h1>
            </div>
        </div>
    </div>
</div>
<?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>