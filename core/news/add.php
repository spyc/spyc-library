<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $v=isset($_POST['title'],$_POST['type'],$_POST['content'],$_SESSION["user"]['name'],$_POST["time"]);
  $result=0;
  if($v){
    $time=str_replace('T',' ',$_POST['time'].':00');
    $intro=str_replace('/^<script>$/','<script&gt;',$_POST['content']);
    $sql=sprintf("INSERT INTO `news`(`etime`,`title`, `type`, `content`, `username`) VALUES (%s,%s,%s,%s,%s)",SQLformatString($time,'text'),SQLformatString($_POST['title'],'text'),SQLformatString($_POST['type'],'text'),SQLformatString($intro,'text'),SQLformatString($_SESSION["user"]['name'],'text'));
    unset($_SESSION['news']);
    $result=mysql_query($sql,$port);
    unset($_SESSION["photo"]);
    header("Location:view.php?add=".$result);
  }
  
?>