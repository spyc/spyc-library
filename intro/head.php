<?php
  require_once "../SilverSnake/jQuery.php.php";
  require_once "../Connection/port.php";
  $_SESSION['right']=256;
?><!DOCTYPE HTML>
<html>
<head>
<?php include "../inc/head/default.inc"; ?>
</head>
<body>
<header class="banner">
<?php include "../inc/navbar/default.inc"; ?>
</header>
<article class="row">
  <div class="col-md-3">
  <?php include "../inc/navbar/intro.inc"; ?>
  </div>
  <div class="center-block">
  <h1>館長的話</h1>
<?php
  $fp=fopen("txt/head.inc","r");
  while(!feof($fp))
    echo fgets($fp);
  fclose($fp);
?>
  </div>
</article>
</body>
</html>