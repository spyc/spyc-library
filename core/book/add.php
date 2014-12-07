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
    $sql=sprintf("INSERT INTO `book`(`title`,`callNo`,`cover`,`isbn`,`intro`,`lang`,`rmc`,`author`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)",SQLformatString($_POST['title'],'text'),SQLformatString($_POST['callNo'],'text'),SQLformatString($_POST['cover']?$_POST["cover"]:"unknown.jpg",'text'),SQLformatString($_POST['isbn'],'text'),SQLformatString($intro,'text'),SQLformatString($_POST['lang'],'text'),SQLformatString($_POST['rmc'],'text'),SQLformatString($_POST['author'],'text'));
    $result=mysql_query($sql,$port);
  }
  header("Location: view.php?action=insert&result=" . $result);
  ob_end_flush();
?>