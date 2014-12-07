<script>
$(document).ready(function(){
  $("nav.navbar > div > ul > li").hover(function(){
      $(this).addClass("active");
    },function(){
      $(this).removeClass("active");
    }
  );
});
</script>
<span class="title">沙田培英中學圖書館</span>
<nav class="navbar navbar-inverse collapse navbar-collapse" role="navigation" style="margin-top:50px;">
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav" id="nav">
      <li><a href="//<?= $_SERVER['HTTP_HOST']?>/library">首頁</a></li>
      <li><a target="_blank" href="//library.pyc.edu.hk/WebOPAC.exe">圖書檢索</a></li>
      <li><a href="//<?= $_SERVER["HTTP_HOST"]?>/library/news.php">最新資訊</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">本館資訊 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/intro/aim.php">本館宗旨</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/intro/book.php">館藏介紹</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/intro/rule.php">圖書館規則</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/intro/head.php">館長的話</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/intro/chairmen.php">主席的話</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/intro/librarian.php">圖書管理員</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">新書推薦 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/newbook.php?lang=ch">中文</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/newbook.php?lang=eng">English</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">排行榜 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/rank.php?rank=book">書籍排行榜</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/rank.php?rank=personal">個人排行榜</a></li>
          <li><a href="http://<?= $_SERVER["HTTP_HOST"]?>/library/graph.php">班別排行榜</a></li>
        </ul>      
      </li>
    </ul>
  </div>
</nav>
