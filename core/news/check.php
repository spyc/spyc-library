<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("SELECT * FROM `news` WHERE `id`=%d",$_GET['id']);
  $reply=mysql_query($sql,$port);
  $result=mysql_fetch_assoc($reply);
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<script>
$(document).ready(function(){
  $("tr:last td.content img").attr("src","../../"+$("tr:last td.content img").attr("src"))
});
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<table class="table table-bordered">
  <tbody>
    <tr><td class="active">標題</td><td class="content"><?= $result['title'] ?></td></tr>
    <tr><td class="active">類別</td><td class="content"><?= $result['type'] ?></td></tr>
    <tr><td class="active">時間</td><td class="content"><?= $result['etime'] ?></td></tr>
    <tr><td class="active">內容</td><td class="content"><?= $result['content'] ?></td></tr>
  </tbody>
</table>
<a href="view.php"><button class="btn btn-info">返回</button></a>
</artcile>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>