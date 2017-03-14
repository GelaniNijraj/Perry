<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perry</title>
    <?php require (ROOT . "/includes/head.php"); ?>
    <style>
        .blog-item{
            background: rgba(0, 0, 0, 0.05);
            padding: 5px 10px 10px 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>
    <div id="wrapper">

        <h1>Your Blogs</h1>

        <?php foreach (User::getCurrentUser()->getBlogs() as $blog){ ?>
            <div class="blog-item">
                <h3 class="blog-title"><?=$blog->title?></h3>
                <a href="/dashboard/<?=$blog->url?>/">Dashboard</a> |
                <a href="/blogs/<?=$blog->url?>">View</a>
            </div>
        <?php } ?>

        <a href="/dashboard/add-blog" style="text-decoration: none; color: #232323;" data-navigo>
            <div class="blog-item">
                <h3 class="blog-title" style="text-align: center;">Add New Blog</h3>
            </div>
        </a>

    </div>
    <?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>