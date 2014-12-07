<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $final=true;
  if($_POST['board']=='personal'){
    for($i=1;$i<=10;$i++){
      $sql=sprintf("SELECT `cname`,`pycid` FROM `student` WHERE `class`=%s AND `class no`=%s",SQLformatString($_POST["name"][$i],"text"),SQLformatString($_POST["detail"][$i],"text"));
      $result=mysql_query($sql,$port);
      $data=mysql_fetch_array($result) or trigger_error("Not Found");
      $_POST["name"][$i]=$data[0];
      $_POST["detail"][$i]=$data[1];
      $final=$final && $result;
      mysql_free_result($result);
    }
  }
  for($i=1;$i<=10;$i++){
    //$sql=sprintf("INSERT INTO `ranking`(`detail`, `name`, `board`, `rank`, `content`,`month`) VALUES (%s,%s,%s,%d,%d,%d)",SQLformatString($_POST['detail'][$i],'text'),SQLformatString($_POST['name'][$i],'text'),SQLformatString($_POST['board'],'text'),SQLformatString($i,'int'),SQLformatString($_POST['content'][$i],'int'),SQLformatString(substr($_POST['month'],5),'int'));
    $sql=sprintf("UPDATE `ranking` SET `detail`=%s,`name`=%s,`content`=%d,`month`=%d WHERE `board`=%s AND`rank`=%d",SQLformatString($_POST['detail'][$i],'text'),SQLformatString($_POST['name'][$i],'text'),SQLformatString($_POST['content'][$i],'int'),SQLformatString(substr($_POST['month'],5),'int'),SQLformatString($_POST['board'],'text'),SQLformatString($i,'int'));
    //echo $sql . "<br>";
    $result=mysql_query($sql,$port);
    //echo $result . "<br>";
  }
  //header("Location:view.php?rank=" . $_POST["board"]);
  echo "<!DOCTYPE html><html><head>";
  include "../../inc/head/default.inc";
  echo "</head><body><header class=\"banner\">";
  include "../../inc/navbar/default.inc";
?><meta http-equiv="refresh" content="180;url=view.php"><script>
$(document).ready(function(){
  $("#nav>li").each(function(i,e){
    $(this).hover(function(){
      $(this).addClass("active");
    },function(){
      $(this).removeClass("active");
    });
  });
});
</script><?= "</header>" ?>
<?php if($final){?>
<div class="alert alert-succcess">Update Success</div>
<?php }else{ ?>
<div class="alert alert-danger">Update Fail</div>
<?php } ?>
<a href="view.php"><button type=button class="btn btn-primary btn-lg">Back</button></a><footer><footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer><?php echo "</body></html>";?>