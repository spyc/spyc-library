<?php
  require_once "SilverSnake/jQuery.php.php";
  require_once "Connection/port.php";
  $meta['level']=256;
?><!DOCTYPE html>
<html>
<head>
<?php include "inc/head/default.inc";?>
</head>
<body>
<header class="banner">
<?php include "inc/navbar/default.inc"; ?>
</header>
<?php
  if(strpos($_SERVER["HTTP_USER_AGENT"],"IE")!=false){
    include "low_alert.htm";
  }
?>
<article style='padding:10px;'>
<?php
  $sql=sprintf("SELECT * FROM `news` WHERE `id`=%d",$_GET['n']);
  $reply=mysql_query($sql,$port);
  if(mysql_num_rows($reply)){
  $result=mysql_fetch_assoc($reply);
?>
  <div class="page-heafer">
  <h1 style="color:green;"><?= $result['title'] ?>
  <small><?= $result['type'] ?></span></h1>
  <time><?= substr($result['etime'],0,10) ?></time>
  </div>
  <div class="container"><?= $result['content'] ?></div>
<?php } ?>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>