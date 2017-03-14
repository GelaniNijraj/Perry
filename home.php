<?php
    if (isset($_SESSION['id']))
        header("Location: /dashboard/index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perry</title>
    <?php require ("includes/head.php"); ?>
</head>
<body>
    <?php require ("includes/menu.php"); ?>
    <div id="wrapper">
        <h1>Welcome to Perry</h1>
        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born.</p>
    </div>

    <?php require ("includes/footer.php"); ?>
</body>
</html>