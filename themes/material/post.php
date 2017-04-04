<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title><?=$perry_blog->title?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?=get_url('css/materialize.css')?>" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?=get_url('css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body style="background: url('<?=get_url("grid6.png")?>') 100px;">

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
          <br><br>
          <a href="<?=get_home_url()?>"><h1 class="header center teal-text text-lighten-5"><?=$perry_blog->title?></h1></a>
          <div class="row center">
              <h5 class="header col s12 light"><?=$perry_blog->headline?></h5>
          </div>
          <br><br>

      </div>
    </div>
    <div class="parallax"><img src="<?=get_url('background2.jpg')?>" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <div class="row">

              <h1 style="text-align: center">
                  <a href="<?=get_home_url()?>post/<?=$perry_post->slug?>"><?=$perry_post->title?></a>
              </h1>
              <h6 style="text-align: center">Published <?=to_ago($perry_post->published_on)?><br /><br /></h6>
          <div class="card-panel white">
              <p class="post"><?=parse_markdown($perry_post->content)?></p>
          </div>
      </div>

    </div>
  </div>

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
          <?=$perry_blog->footer?>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="<?=get_url('js/jquery.js')?>"></script>
  <script src="<?=get_url('js/materialize.js')?>"></script>
  <script src="<?=get_url('js/init.js')?>"></script>

  </body>
</html>
