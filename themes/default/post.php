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

        <div class="post">
            <h1 class="post-title">
                <a href="#"><?=$perry_post->title?></a>
            </h1>
            <h4 style="color: rgba(0, 0, 0, 0.6); text-align: center"><?=to_ago($perry_post->published_on)?></h4>
            <p class="post"><?=parse_markdown($perry_post->content)?></p>
<!--            <form>-->
<!--                <label>Email :-->
<!--                    <input type="text">-->
<!--                </label><br />-->
<!--                <label>Comment :-->
<!--                    <textarea></textarea>-->
<!--                </label><br />-->
<!--                <input type="submit" value="Comment">-->
<!--            </form>-->
            <p style="text-align: center;"><br /><br />* * *</p>
        </div>

    </div>
    <footer><?=$perry_blog->footer?></footer>
</body>
</html>