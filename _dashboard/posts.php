<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <?php require (ROOT . "/includes/head.php"); ?>
    <style>
        .post{
            /*height: 70px;*/
            background: #F3F3F3;
            padding: 10px;
            transition: 0.1s;
            margin-bottom: 5px;
        }
        .post > h2{
            margin-top: 0;
        }

        .post:hover{
            background: rgba(0, 0, 0, 0.2);
        }

        .menu{
            list-style: none;
        }

        .menu > li > a{
            text-decoration: none;
            height: 40px;
            line-height: 40px;
            display: block;
            padding: 0 10px;
        }
        .menu > li > a:hover{
            text-decoration: underline;
        }
        .menu > li > a.active{
            background: #F3F3F3;
        }
    </style>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>

    <div id="wrapper">


        <div class="row">
            <div class="col-6-12"><h1>Posts</h1></div>
            <div class="col-6-12" style="text-align: right">
                <input type="button" class="green" value="Add Post" onclick="window.location.href = '/dashboard/<?=Blog::getCurrentBlog()->url?>/posts/add';">
            </div>
        </div>

        <div class="row">
            <div class="col-3-12">
                <ul class="menu">
                    <li><a href="?all" class="active">All</a></li>
                    <li><a href="?published">Published</a></li>
                    <li><a href="?drafts">Drafts</a></li>
                </ul>
            </div>
            <div class="col-9-12">
                <?php
                    $posts = Blog::getCurrentBlog()->getPosts(null, $_GET['page'] ?? 1);
                    if(count($posts) == 0){
                        echo "<h2>Add some posts to see 'em here</h2>";
                    }
                    foreach ($posts as $p){
                ?>
                <div class="post">
                    <h2><?=$p->title?></h2>
                    <a href="/dashboard/<?=Blog::getCurrentBlog()->url?>/posts/edit/<?=$p->id?>">Edit</a> |
                    <a href="#">Delete</a>
                </div>
                <?php } ?>
                <ul class="paging">
                    <?php
                        $pages = ceil(Blog::getCurrentBlog()->getPostsCount() / 10);
                        for($i = 1; $i <= $pages; $i++){
                    ?>
                    <li><a href="/dashboard/<?=Blog::getCurrentBlog()->url?>/posts/page/<?=$i?>" class="<?=($_GET['page'] ?? 1) == $i ?'active' : ''?>"><?=$i?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>