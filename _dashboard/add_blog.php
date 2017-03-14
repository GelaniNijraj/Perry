<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new blog</title>
    <?php require (ROOT . "/includes/head.php"); ?>
    <script>
        $(document).ready(function () {
            $("#blogForm").ajaxForm({
                url: "/ajax/add_blog.php",
                target: output
            });
        });

        function getSlug(str) {
            $.post("/ajax/slug.php", {
                "name": str
            }, function (output) {
                $("#blogUrl").val(output);
            });
        }
    </script>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>

    <div id="wrapper">
        <h1>New Blog</h1>
        <form method="post" id="blogForm" style="width: 450px;">
            <div id="step-1" style="clear: both; float: none;">
                <div class="row">
                    <div class="col-12-12">
                        <input type="text" name="title" placeholder="Blog Title" onchange="getSlug(this.value);">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12-12">
                        <div class="col-6-12">
                            <span class="error">http://127.0.0.1/blogs/</span>
                        </div>
                        <div class="col-6-12">
                            <input type="text" name="url" placeholder="Blog URL" id="blogUrl">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12-12">
                        <textarea placeholder="Description" name="description" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3-12">
                        <input type="submit" value="Create" class="green">
                    </div>
                    <div class="col-9-12 error" id="output"></div>
                </div>
            </div>
        </form>
    </div>

    <?php require (ROOT . "/includes/footer.php"); ?>
</body>
</html>