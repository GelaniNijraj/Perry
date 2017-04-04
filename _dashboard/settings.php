<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <?php require (ROOT . "/includes/head.php"); ?>
    <script>
        function pullThePlug(e) {
            e.preventDefault();
            if(confirm("Are you really sure that you want to delete the blog?")){
                deleteForm.submit();
            }
        }
    </script>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>
    <?php $blog = Blog::getCurrentBlog(); ?>
    <div id="wrapper">
        <div class="row">
            <div class="col-6-12"><h1>Settings</h1></div>
            <div class="col-6-12" style="text-align: right">
                <form id="deleteForm" action="delete" method="post">
                    <input type="hidden" name="blog_id" value="<?=Blog::getCurrentBlog()->id?>">
                    <input type="submit" class="red" value="Delete Blog" onclick="pullThePlug(event);">
                </form>
            </div>
        </div>

        <form method="post" id="settingsForm">
            <div class="row">
                <div class="col-6-12">
                    <input type="text" placeholder="Blog Title" name="title" value="<?=$blog->title?>">
                </div>
                <div class="col-6-12">
                    <input type="text" placeholder="Blog Headline Text" name="headline" value="<?=$blog->headline?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6-12">
                    <div class="col-6-12">
                        <span class="error">http://127.0.0.1/blogs/</span>
                    </div>
                    <div class="col-6-12">
                        <input type="text" name="url" placeholder="Blog URL" id="blogUrl" value="<?=$blog->url?>">
                    </div>
                </div>
                <div class="col-6-12">
                    <input type="text" placeholder="Footer Text" name="footer" value="<?=$blog->footer?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6-12">
                    <textarea placeholder="Description" rows="6" name="description"><?=$blog->description?></textarea>
                </div>
                <div class="col-6-12">
                    <div class="row">
                        <div class="col-4-12">
                            <label class="error">Posts per page :</label>
                        </div>
                        <div class="col-8-12">
                            <input type="text" placeholder="Posts per Page" name="posts_per_page" value="<?=$blog->posts_per_page?>">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 13px;">
                        <label>Theme :
                            <select style="width: 100%" name="theme">
                                <?php foreach (Theme::all() as $t){ ?>
                                    <option value="<?=$t->id?>" <?=(Blog::getCurrentBlog()->theme == $t->id)? 'selected' : ''?>><?=$t->name?></option>
                                <?php } ?>
                            </select>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12-12">
                    <input type="submit" value="Save" class="green">
                    <span class="error" id="settingsOutput"></span>
                </div>
            </div>
        </form>
        <?php


        ?>
    </div>
    <?php require (ROOT . "/includes/footer.php"); ?>

    <script>
        $("#settingsForm").ajaxForm({
            url: "/ajax/settings.php",
            target: settingsOutput
        });
    </script>
</body>
</html>