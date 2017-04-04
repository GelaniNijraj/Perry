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
    <?php
        $user = User::getCurrentUser();
    ?>
    <div id="wrapper">
        <div class="row">
            <div class="col-6-12"><h1>Account</h1></div>
            <div class="col-6-12" style="text-align: right">
                <form id="deleteForm" action="delete" method="post">
                    <input type="hidden" name="blog_id" value="<?=Blog::getCurrentBlog()->id?>">
                    <input type="submit" class="red" value="Delete Account" onclick="pullThePlug(event);">
                </form>
            </div>
        </div>

        <form method="post" id="settingsForm">
            <div class="row">
                <div class="col-6-12">
                    <input type="text" placeholder="Username" name="title" value="<?=$user->username?>">
                </div>
            </div>


            <div class="row">
                <div class="col-6-12">
                    <input type="text" placeholder="Email" name="title" value="<?=$user->email?>">
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <label>Change Password :</label>
            </div>
            <div class="row">
                <div class="col-6-12">
                    <input type="password" placeholder="New password" name="new_password" value="">
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