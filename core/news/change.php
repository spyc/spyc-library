<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $v=isset($_POST['title'],$_POST['type'],$_POST['content'],$_SESSION["user"]['name'],$_GET['id']);
  //echo $v.'<br>';
  if($v){
    $sql=sprintf("UPDATE `news` SET `title`=%s,`type`=%s,`content`=%s,`username`=%s WHERE `id`=%d",SQLformatString($_POST['title'],'text'),SQLformatString($_POST['type'],'text'),SQLformatString($_POST['content'],'text'),SQLformatString($_SESSION["user"]['name'],'text'),SQLformatString($_GET['id'],'int'));
    //echo '<pre>';
    //print_r ($_POST);
    //echo '</pre><br>';
    $result=mysql_query($sql,$port);
  }
  header('Location:view.php?action=edit&result='.$result);
?>