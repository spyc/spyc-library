<div class="navbar navbar-static-top navbar-inverse" role="navigation">
  <div class="container">
  <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="//<?= $_SERVER['HTTP_HOST'] ?>/library/core/" class="navbar-brand">Library</a>
    </div>
  <nav class="collapse navbar-collapse">
    <ul class="nav navbar-nav" id="nav">
<?php if($_SESSION["user"]["right"]<2){?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">管理成員 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="//<?= $_SERVER['HTTP_HOST'] ?>/library/core/member/input.php">新增成員</a></li>
          <li><a href='//<?= $_SERVER['HTTP_HOST'] ?>/library/core/member/view.php'>檢視成員</a></li>
        </ul>
      </li>
<?php } if($_SESSION["user"]["right"]<3){?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">消息管理 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/news/input.php">新增消息</a></li>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/news/view.php">消息瀏覽</a></li>
        </ul>
      </li><?php } ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">新書推介 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/book/input.php?lang=en">英文新書</a></li>
          <li><a href="//<?= $_SERVER['HTTP_HOST'] ?>/library/core/book/input.php?lang=zh">中文新書</a></li>
          <li><a href="//<?= $_SERVER['HTTP_HOST'] ?>/library/core/book/view.php">檢視新書</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">排行榜 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/rank/update.php">更新排行榜</a></li>
          <li><a href="//<?= $_SERVER['HTTP_HOST'] ?>/library/core/rank/view.php">檢視排行榜</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Link <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/account.php">Account</a></li>
<?php if($_SESSION["user"]["right"]<3){?>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/student.php">學生</a></li>
<?php if($_SESSION["user"]["right"]==1||$_SESSION["user"]["right"]==-1){?>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/editor.php?file=head&folder=intro%2Ftxt">館長的話</a></li>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/editor.php?file=rule&folder=intro%2Ftxt">圖書館規則</a></li>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/editor.php?file=aim&folder=intro%2Ftxt">本館宗旨</a></li>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/editor.php?file=book&folder=intro%2Ftxt">館藏介紹</a></li>
<?php }if($_SESSION["user"]["right"]==2||$_SESSION["user"]["right"]==1||$_SESSION["user"]["right"]==-1){?>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/editor.php?file=librarian&folder=intro%2Ftxt">圖書管理員</a></li>
<?php }if($_SESSION["user"]["right"]==2||$_SESSION["user"]["right"]==-1){?>
          <li><a href="//<?= $_SERVER["HTTP_HOST"] ?>/library/core/editor.php?file=chairmen&folder=intro%2Ftxt">主席的話</a></li>
<?php }} ?>
        </ul>
      </li>      
    </ul>
    <p class="navbar-text navbar-right">
      Signin as <?= $_SESSION["user"]["name"] ?> <a href="//<?= $_SERVER['HTTP_HOST'] ?>/library/core/logout.php" class="navbar-link"><button class="btn btn-primary navbar-btn">Logout</button></a></p>
  </nav>
  </div>
</div>
<script>
$(document).ready(function(){
  $("ul#nav>li").each(function(i,e){
    $(this).hover(function(){
      $(this).addClass("active");
    },function(){
      $(this).removeClass("active");
    });
  });
});
</script>