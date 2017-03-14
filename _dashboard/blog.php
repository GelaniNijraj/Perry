<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?=Blog::getCurrentBlog()->title;?></title>
    <?php require (ROOT . "/includes/head.php"); ?>
</head>
<body>
<?php require (ROOT . "/includes/menu.php"); ?>
<div id="wrapper">
    <h1><?=Blog::getCurrentBlog()->title;?></h1>
    <p><?=Blog::getCurrentBlog()->getPostsCount()?> Post(s)</p>
</div>
<?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>