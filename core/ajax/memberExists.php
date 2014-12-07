<?php
  ob_start();
  session_start();
  if(!isset($_SESSION["user"])){
    header("HTTP/1.1 403 Forbidden");
    exit();
  }
  if($_SERVER["REQUEST_METHOD"] != "GET"){
    header("HTTP/1.1 405 Method Not Allow");
    header("Allow: GET");
    exit();
  }
  header("Content-type:text/plain");
  require_once '../../SilverSnake/jQuery.php.php';
  require_once '../../Connection/port.php';
  $sql=sprintf("SELECT * FROM `member` WHERE `username`=%s LIMIT 1",SQLformatString($_GET["username"],"text"));
  $result=mysql_query($sql,$port);
  echo mysql_num_rows($result);
  mysql_free_result($result);
  ob_end_flush();
?>