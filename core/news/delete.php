<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("DELETE FROM `news` WHERE `id`=%d",$_GET['id']);
  $result=mysql_query($sql,$port);
  header('Location:view.php?delete='.$result);
?>