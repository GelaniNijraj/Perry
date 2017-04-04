<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 2:10 PM
 */
?>
<div id="menu">
    <a href="#" id="show_sidebar"><img src="<?=ROOT_URL?>/images/platipus.png" /></a>
    <?php if(!User::isLoggedIn()){ ?>
        <ul>
            <li><a href="#" id="show-login">Log-In</a></li>
            <li><a href="<?=ROOT_URL?>/register">Register</a></li>
            <li><a href="#">Home</a></li>
        </ul>
    <?php }else{ ?>
        <ul>
            <li><a href="<?=ROOT_URL?>/logout.php">Log-Out</a></li>
            <li><a href="/dashboard/account">Account</a></li>
            <li><a href="/dashboard/">All Blogs</a></li>
        </ul>
    <?php } ?>
</div>

<?php if (isset($_GET['blog'])){ ?>
    <div id="sidebar">
        <ul style="margin-top: 50px;">
            <li><a href="/<?=Blog::getCurrentBlog()->url?>/" target="_blank">View Blog</a></li>
            <li><a href="/dashboard/<?=Blog::getCurrentBlog()->url?>/">Dashoard</a></li>
            <li><a href="/dashboard/<?=Blog::getCurrentBlog()->url?>/posts">Posts</a></li>
            <li><a href="/dashboard/<?=Blog::getCurrentBlog()->url?>/categories">Categories</a></li>
            <li><a href="/dashboard/<?=Blog::getCurrentBlog()->url?>/settings">Settings</a></li>
        </ul>
    </div>
<?php } ?>

<script>
    var showingSidebar = false;
    function hideSidebar(){
        $("#sidebar").css({"left": "-250px"});
        showingSidebar = false;
    }

    function showSidebar() {
        $("#sidebar").css({"left": "0"});
        showingSidebar = true;
    }

    $(document).ready(function () {
        $("#loginForm").ajaxForm({
            url: "ajax/login.php",
            target: loginOutput
        });
        $("#show_sidebar").click(function () {
            if(showingSidebar)
                hideSidebar();
            else
                showSidebar();
        });
    });
</script>

<div class="login-box">
    <form method="post" id="loginForm">
        <input type="text" placeholder="Username/Email" name="username" style="color: #FFFFFF; border-color: rgba(255, 255, 255, 0.5); margin: 2px;">
        <input type="password" placeholder="Password" name="password" style="color: #FFFFFF; border-color: rgba(255, 255, 255, 0.5); margin: 2px;"><br />
        <input type="submit" value="Log-In" style="margin: 2px; border: thin solid rgba(0, 0, 0, 0.2)" /><span class="error" style="font-size: 12px; color: #FFFFFF;" id="loginOutput"></span>
    </form>
</div>
