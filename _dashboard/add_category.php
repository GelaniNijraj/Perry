<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perry</title>
    <?php require (ROOT . "/includes/head.php"); ?>
</head>
<body>
    <?php require (ROOT . "/includes/menu.php"); ?>
    <?php

    if(isset($_GET['edit'])){
            $edit = true;
            $category = new Category($_GET['edit']);
            if($category->blog != Blog::getCurrentBlog()->id){
                header("Location: categories.php");
            }
        }else{
            $edit = false;
            $category = new Category(null);
        }
    ?>
    <div id="wrapper">
        <div class="row">
            <div class="col-6-12"><h1><?=$edit?"Edit category":"New category"?></h1></div>
            <div class="col-6-12" style="text-align: right">
                <input type="button" class="red" value="Delete Category" onclick="window.location = 'categories/add';">
            </div>
        </div>
        <form method="post" id="addPostForm">
            <div class="row">
                <div class="col-6-12">
                    <input type="hidden" name="edit" value="<?=$_GET['edit']?>">
                    <input type="text" name="name" placeholder="Category Name" value="<?=$category->name?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-12-12">
                    <input type="submit" value="<?=$edit?"Save Category":"Add Category"?>" class="green">
                    <input type="button" value="Discard" class="red" onclick="window.location.replace('/dashboard/<?=Blog::getCurrentBlog()->url?>/categories');">
                    <span id="addPostOutput" class="error"></span>
                </div>
            </div>
        </form>
    </div>

    <?php require (ROOT . "/includes/footer.php"); ?>

    <script>
        $("#addPostForm").ajaxForm({
            url: "/ajax/add_category.php",
            target: addPostOutput
        });
    </script>
</body>
</html>