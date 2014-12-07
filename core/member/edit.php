<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("SELECT * FROM `member` WHERE `pycid`=%s AND `jurisdiction`=%d",SQLformatString($_GET["id"],"text"),SQLformatString($_GET['right'],'int'));
  $result=mysql_fetch_assoc(mysql_query($sql,$port));
  if(isset($_POST["level"])){
    $sql=sprintf("UPDATE `member` SET `jurisdiction`=%d WHERE `pycid`=%s",SQLformatString($_POST["level"],"int"),SQLformatString($_GET["id"],"text"));
    $result=mysql_query($sql,$port);
  }
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<div class="alert" style="display:none;"></div>
<form method="post" class="form-horizontal" role="form">
  <div class="form-group">
    <label for="level" class="col-sm-2 control-label">New Post: </label>
    <div class="col-sm-10">
      <select id="level" name="level" class="form-control">
        <option value="3">Librarian</option>
        <option value="2">Chairman</option>
        <option value="0">Tech</option>
      </select>
    </div>
  </div>
  <div class="form-group col-sm-offset-2 col-sm-10">
    <input type="submit" class="btn btn-primary" value="Change">
  </div>
</form>
</article>
<footer>
  <p class="copyright">
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>