<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <?php require (ROOT . "/includes/head.php"); ?>
    <style>
        h3, p, .delete{
            text-align: center;
            width: 100%;
        }

        .category{
            background: #F3F3F3;
            padding: 10px;
            transition: 0.2s;
        }

        .category:hover{
            background: #cdcdcd;
        }
    </style>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>

    <div id="wrapper">

        <div class="row">
            <div class="col-6-12"><h1>Categories</h1></div>
            <div class="col-6-12" style="text-align: right">
                <input type="button" class="green" value="Add Category" onclick="window.location = 'categories/add';">
            </div>
        </div>
        <?php
            $categories = Blog::getCurrentBlog()->getCategories();
            $i = 0;
            foreach ($categories as $c){
        ?>
            <div class="col-3-12">
                <a href="categories/edit/<?=$c->id?>" class="delete" style="text-decoration: none">
                    <div class="category">
                        <h3><?=$c->name?></h3>
                        <p class="post-count"><?=$c->getPostsCount()?> Posts</p>
                    </div>
                </a>
            </div>
        <?php $i++; } ?>
    </div>

    <?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>