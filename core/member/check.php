<?php
  require_once "../../Connection/port.php";
  include_once "../../SilverSnake/jQuery.php.php";
  $sql=sprintf("SELECT * FROM `member` WHERE `username`=%s",SQLformatString($_GET['username'],'text'));
  $result=mysql_query($sql,$port);
  echo mysql_num_rows($result);
  mysql_free_result($result);
?>