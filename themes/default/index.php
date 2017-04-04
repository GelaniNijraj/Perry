<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$perry_blog->title?></title>
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link rel="stylesheet" href="<?=get_url("assets/main.css");?>">
</head>
<body>
    <div id="wrapper">
        <h1 class="title">
            <a href="<?=get_home_url()?>"><?=$perry_blog->title?></a>
        </h1>
        <h5 class="headline"><?=$perry_blog->headline?></h5>
        <hr />
        <?php foreach ($perry_posts as $post){ ?>
            <div class="post">
                <h1 class="post-title">
                    <a href="<?=get_home_url()?>post/<?=$post->slug?>"><?=$post->title?></a>
                </h1>
                <h4 style="color: rgba(0, 0, 0, 0.6); text-align: center"><?=to_ago($post->published_on)?></h4>
                <p class="post-excerpt"><?=get_excerpt($post->content)?></p>
                <p style="text-align: center;"><br /><br />* * *</p>
            </div>
        <?php  } ?>
        <ul class="paging">
            <?php
                for($i = 1; $i <= get_total_pages($perry_blog); $i++)
                    echo "<li><a href='" . get_home_url("page/$i") . "'>$i</a></li>";
            ?>
        </ul>
    </div>
    <footer><?=$perry_blog->footer?></footer>
</body>
</html>