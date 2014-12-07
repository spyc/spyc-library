<!DOCTYPE HTML>
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
  <h1>圖書管理員</h1>
<?php
  $fp=fopen("txt/librarian.inc","r");
  while(!feof($fp))
    echo fgets($fp);
  fclose($fp);
?>
  </div>
</article>
</body>
</html>
</html>