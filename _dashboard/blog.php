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
    </style>
</head>
<body>
<?php require (ROOT . "/includes/menu.php"); ?>
<div id="wrapper">
    <h1><?=Blog::getCurrentBlog()->title;?> - Dashboard</h1>
    <p>Welcome to your blog's dashboard.</p>
    <p>You can add posts and categories as well as tweak settings and change theme from the sidebar on the left. A quick overview of stats is given below.</p>

    <p><b>Total Posts : </b><?=Blog::getCurrentBlog()->getPostsCount()?></p>
    <p><b>Total Categories : </b><?=count(Blog::getCurrentBlog()->getCategories())?></p>
    <p><b>Blog Theme : </b><?=Illuminate\Database\Capsule\Manager::table("theme")->where("id", "=", Blog::getCurrentBlog()->theme)->first()->name?></p>
</div>
<?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>