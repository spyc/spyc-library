<?php
  ob_start();
  session_start();
  require_once("../inc/right/login.inc");
  require_once("../SilverSnake/jQuery.php.php");
  require_once("../inc/mysqli.php");
  if(!isset($_SESSION["user"])||$_SESSION["user"]["right"]>=256){
    header("Location:signin.php");
    exit();
  }
?><!DOCTYPE html>
<html>
<head>
<?php include "../inc/head/core.inc";?>
</head>
<body>
<header class="banner">
<?php include "../inc/navbar/core.inc";?>
</header>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
<?php ob_end_flush(); ?>