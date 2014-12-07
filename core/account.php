<?php
  ob_start();
  session_start();
  require_once "../inc/right/login.inc";
  require_once "../SilverSnake/jQuery.php.php";
  require_once "../Connection/port.php";
  $change=false;$send=false;
  if(isset($_POST['ori'],$_POST['pw'],$_POST['key'])&&$_POST['pw']==$_POST['key'] && $_SERVER["REQUEST_METHOD"] == "POST"){
    $send=true;
    $sql=sprintf("SELECT * FROM `member` WHERE `password`=%s AND `name`=%s",SQLformatString(md5($_POST['ori']),'text'),SQLformatString($_SESSION["user"]['name'],'text'));
  if(mysql_num_rows($result=mysql_query($sql,$port))){
    $sql=sprintf("UPDATE `member` SET `password`=%s WHERE `name`=%s LIMIT 1",SQLformatString(md5($_POST['pw']),'text'),SQLformatString($_SESSION['name'],'text'));
    $change=mysql_query($sql,$port);
    }    
  mysql_free_result($result);
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include "../inc/head/core.inc";?>
<script>
$(document).ready(function(){
  $('.alert').hide().click(function(){
    $(this).slideUp();
  });
  $('#ori').focus();
  $('form').submit(function(){
    if($('#key').val()!=$('#pw').val()){
      return false;
    }else{
      $(':password').each(function(){
        $(this).val(md5($(this).val()));
      });
    }
  });
  if(<?= $send ?>){
     alert(<?= $change ?>?"Success":"Failed");
  }
});
</script>
</head>
<body>
<div class="alert"></div>
<header class="banner">
<?php include "../inc/navbar/core.inc";?>
</header>
<article class="container">
  <form method="post" class="form-horizontal" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <h3>Account</h3>
    <div class="form-group">
    <label for="ori" class="control-label col-sm-2">Orginal Password</label>
    <div class="col-sm-10">
      <input type="password" name="ori" id="ori" autofocus required placeholder="Orginal Password" class="form-control" />
    </div>
    </div>
    <div class="form-group">
    <label for="pw" class="control-label col-sm-2">New Password </label>
    <div class="col-sm-10">
      <input type="password" name="pw" id="pw" class="form-control" required placeholder="New Password">
    </div>
    </div>
    <div class="form-group">
    <label for="key" class="control-label col-sm-2">Password Confirm</label>
    <div class="col-sm-10">
      <input type="password" name="key" id="key" class="form-control" required placeholder="Password Confirm">
    </div>
    </div>
    <div class="form-group">
      <input type="submit" value="Change Password" class="btn btn-primary">
      <input type="reset" value="Reset" class="btn btn-primary">
    </div>
</form>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
<?php ob_end_flush(); ?>