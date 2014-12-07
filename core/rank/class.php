<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  //pre_print_r($_POST);
  $final=true;
  foreach($_POST["content"] as $i => $v){
    //$sql=sprintf("INSERT INTO `ranking`(`detail`, `name`, `board`, `rank`, `content`,`month`) VALUES (%s,%s,%s,0,%d,%d)","NULL",SQLformatString($i,"text"),"'class'",SQLformatString($v,'int'),SQLformatString(substr($_POST["month"],5),'int'));
    $sql=sprintf("UPDATE `ranking` SET `detail`=%s,`name`=%s,`content`=%d,`month`=%d WHERE `board`='class'","NULL",SQLformatString($i,"text"),SQLformatString($_POST['content'][$i],'int'),SQLformatString(substr($_POST['month'],5),'int'));
    //echo $sql . "<br>";
    $result=mysql_query($sql,$port);
    //echo $result . "<br>";
    $final=$result&&$final;
  }
  //header("Location:view.php?rank=" . $_POST["board"]);
  ?><!DOCTYPE html><html><head><?php include "../../inc/head/default.inc"; ?></head>
<body><?php if($final){?>
  <div class="alert alert-success">Update Success!</div>
  <?php }else{ ?>
  <div class="alert alert-danger">Update Fail!</div>
  <?php }?><a href="view.php"><button type=button class="btn btn-primary btn-lg">Back</button></a><footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body></html>