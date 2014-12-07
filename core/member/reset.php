<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("SELECT * FROM `member` WHERE `pycid`=%s AND `jurisdiction`=%d",SQLformatString($_GET['id'],'text'),SQLformatString($_GET['right'],'int'));
  $result=mysql_query($sql,$port);
  $data=mysql_fetch_assoc($result);
  mysql_free_result($result);
  $key='';
  $char='qwerrtyuiopasdfghjklzxcvbnmPOIUYTREWQASSDFGHHJKLMNBVCZ741236985';
  $len=strlen($char);
  for($i=0;$i<8;$i++)
    $key .= $char[rand(0, $len - 1)];
  $sql=sprintf("UPDATE `member` SET `password`=%s WHERE `pycid`=%s",SQLformatString(md5(md5($key)),'text'),SQLformatString($_GET['id'],'text'));
  $result=mysql_query($sql,$port);
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
  <div class="alert" style="display:none;"></div>
  <table class="table table-bordered">
  <thead>
    <tr><th>項目</th><th>資料</th></tr>
  </thead>
  <tbody>
    <tr>
      <td>Username:</td>
      <td><?= $data['username'] ?></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><?= $data['name'] ?></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><?= $key ?></td>
    </tr>
  </tbody>
  </table>
  <a href="view.php"><button class="btn btn-info">返回</button></a>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
<?php mysql_free_result($result); ?>