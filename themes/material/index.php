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

          <?php foreach ($perry_posts as $post){ ?>
              <div class="row">
                  <div class="card-panel white">
                      <h3>
                          <a href="<?=get_home_url()?>post/<?=$post->slug?>"><?=$post->title?></a>
                      </h3>
                      <h6>Published <?=to_ago($post->published_on)?></h6>
                      <p class="flow-text"><?=get_excerpt($post->content)?></p>
                  </div>
              </div>
          <?php  } ?>

          <?php if(get_total_pages($perry_blog) > 1){ ?>
              <ul class="pagination">
                  <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                  <?php
                  for($i = 1; $i <= get_total_pages($perry_blog); $i++)
                      echo "<li class='" . ($i == get_current_page() ? 'active' : 'waves-effect') ."'><a href='" . get_home_url("page/$i") . "'>$i</a></li>";
                  ?>
                  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
              </ul>
          <?php } ?>
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
