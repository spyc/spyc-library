<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  require_once "../htmlpurifier/library/HTMLPurifier.auto.php";
  $v=isset($_POST['lang'],$_POST['title'],$_POST['callNo'],$_POST['isbn'],$_POST['intro'],$_POST['cover']);
  $result=0;
  if($v){
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $intro = $purifier->purify($_POST["intro"]);
    $sql=sprintf("UPDATE `book` SET `rmc`=%s,`title`=%s,`author`=%s,`callNo`=%s,`intro`=%s,`isbn`=%s,`lang`=%s WHERE `id`=%d",SQLformatString($_POST["rmc"],"text"),SQLformatString($_POST["title"],"text"),SQLformatString($_POST["author"],"text"),SQLformatString($_POST["callNo"],"text"),SQLformatString($_POST["intro"],"text"),SQLformatString($_POST["isbn"],"text"),SQLformatString($_POST["lang"],"text"),SQLformatString($_POST["id"],"int"));
    $result=mysql_query($sql,$port);
  }
  header("Location:view.php?action=edit&result=".$result);
  ob_end_clean();
?>