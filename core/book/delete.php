<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("DELETE FROM `book` WHERE `id`=%d LIMIT 1",$_GET['id']);
  header('Location:view.php?action=delete&result=' . mysql_query($sql,$port));
  ob_end_flush();
?>