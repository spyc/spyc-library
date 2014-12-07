<?php
  require_once "SilverSnake/jQuery.php.php" ;
  require_once "Connection/port.php";
  $_SESSION["right"]=256;
  $sql=sprintf("SELECT * FROM `book` WHERE `id`=%d",$_GET["b"]);
  $result=mysql_query($sql,$port);
  $data=mysql_fetch_array($result);
  mysql_free_result($result);
?><!DOCTYPE html>
<html>
<head>
<?php include "inc/head/default.inc";?>
</head>
<body>
<header class="banner">
<?php include "inc/navbar/default.inc";?>
</header>
<?php
  if(strpos($_SERVER["HTTP_USER_AGENT"],"IE")!=false){
    include "low_alert.htm";
  }
?>
<article>
  <a href="<?=$_SERVER['HTTP_REFERER']?>">Back</a>
<div class="page-header">
  <h1><?= $data[2] ?>&emsp;<small><?= $data[4] ?></h1>
</div>
<div class="container">
  <img class="pull-right img-rounded" src="book/<?= $data[5] ?>">
  <p>Author: <?= $data[3] ?></p>
  <br>
  <?= $data[6] ?>
</div>
</article>
<footer>
  <p class='copyright'>
    Copyright c 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>