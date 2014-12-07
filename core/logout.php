<?php
  ob_start();
  session_start();
  require_once "../SilverSnake/jQuery.php.php";
  require_once "../Connection/port.php";
  $sql=sprintf("INSERT INTO `iorecord`(`id`, `login`) VALUES (%s,%s)",SQLformatString($_SESSION['name'],'text'),SQLformatString(date('Y-m-d H:i:s',$_SESSION['login']),'text'));
  mysql_query($sql,$port);
  session_destroy();
  header("Location:signin.php");
  ob_end_flush();
?>