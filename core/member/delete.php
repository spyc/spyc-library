<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("DELETE FROM `librarian` WHERE `pycid`=%s",SQLformatString($_GET["id"],"text"));
  $result=mysql_query($query);
  header("Location:view.php?action=delete&result=" . $result[0]&&$result[1]);
  unset($result);
  ob_end_flush();
?>