<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 2:11 PM
 */
?>
<link href="<?=ROOT_URL?>/styles/main.css" rel="stylesheet" />
<link href="<?=ROOT_URL?>/styles/grid.css" rel="stylesheet" />
<!--<link href="https://fonts.googleapis.com/css?family=Catamaran:100" rel="stylesheet">-->
<!--<script-->
<!--    src="https://code.jquery.com/jquery-3.1.1.min.js"-->
<!--    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="-->
<!--    crossorigin="anonymous"></script>-->
<!--<script-->
<!--    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"-->
<!--    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="-->
<!--    crossorigin="anonymous"></script>-->

<script src="<?=ROOT_URL?>/scripts/jquery.js"></script>
<script src="<?=ROOT_URL?>/scripts/jquery-ui.js"></script>
<script src="<?=ROOT_URL?>/scripts/jquery.form.min.js"></script>
<!--<script src="--><?//=ROOT_URL?><!--/scripts/navigo.min.js"></script>-->

<script>
    $(document).ready(function(){
        $("#show-login").click(function(){
            $(".login-box").fadeToggle();
            console.log($(this).css("background"));
        });
    });
</script>