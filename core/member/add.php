<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../Connection/port.php";
  echo "<!DOCTYPE html>\n";
  $sql=sprintf("INSERT INTO `member`(`username`,`password`,`name`,`jurisdiction`,`pycid`) VALUES (%s,%s,%s,%d,%s)",SQLformatString($_POST['username'],'text'),SQLformatString(md5($_POST['password']),'text'),  SQLformatString($_POST['name'],'text'),SQLformatString($_POST['right'],'int'),SQLformatString($_POST["pyc"],"text"));
  $result=mysql_query($query);
  header("Location: view.php?action=insert&result=" . $result);
  ob_end_flush();
?>