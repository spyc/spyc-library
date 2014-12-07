<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("SELECT * FROM `book` WHERE `id`=%d",$_GET['id']);
  $reply=mysql_query($sql,$port);
  $result=mysql_fetch_assoc($reply);
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<div style='margin-left:5em;padding:2em;'>
<img style='float:right;' src='../../book/<?= $result['cover'] ?>' alt='<?= $result['cover'] ?>' width="300" height="400">
<p>Language: <?= $result['lang']=='zh'?'中文':'English' ?></p>
<p>Title: <?= $result['title'] ?></p>
<p>Author: <?= $result['author'] ?></p>
<p>Call No.: <?= $result['callNo'] ?></p>
<p>ISBN: <?= $result['isbn'] ?></p>
<p>Introducation:</p>
<div style='border:2px solid #000;width:700px;height:300px;'>
<?= $result['intro'] ?>
</div>
</div>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
<?php
  mysql_free_result($reply);
  ob_end_flush();
?>