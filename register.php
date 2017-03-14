<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register on Perry</title>
    <?php require ("includes/head.php"); ?>
    <script>
        $(document).ready(function () {
            $("#registerForm").ajaxForm({
                url: "ajax/register.php",
                target: registerOutput
            });
        });
    </script>
</head>
<body>
    <?php require ("includes/menu.php"); ?>

    <div id="wrapper">
        <h1>Create a new Account</h1>
        <form method="post" id="registerForm" style="width: 450px;">
            <div id="step-1" style="clear: both; float: none;">
                <div class="row">
                    <div class="col-6-12">
                        <input type="text" name="fname" placeholder="First Name">
                    </div>
                    <div class="col-6-12">
                        <input type="text" name="lname" placeholder="Last Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12-12">
                        <input type="text" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6-12">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-6-12">
                        <input type="password" name="rpassword" placeholder="Re-Enter Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3-12">
                        <input type="submit" value="Register" class="green">
                    </div>
                    <div class="col-9-12">
                        <p class="error" id="registerOutput"></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php require ("includes/footer.php"); ?>
</body>
</html>