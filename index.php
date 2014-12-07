<?php
  session_start();
  $_SESSION['right']=256;
  print "<!DOCTYPE html>\n";
?>
<html>
<head>
<?php require "inc/head/default.inc";?>
</head>
<body>
<header class="banner">
<?php include "inc/navbar/default.inc"; ?>
</header>
<?php
  if(strpos($_SERVER["HTTP_USER_AGENT"],"IE")!=false){
    include "low_alert.htm";
  }
?>
<article class="row">
<div class="col-md-7" style="max-width:700px;">
  <iframe src="http://library.pyc.edu.hk/WebOPAC.exe" width='600px' height='400px'><a href="//library.pyc.edu.hk/WebOPAC.exe">圖書檢索</a></iframe>
</div>
<div class="col-md-1" style="max-width:100px;">
  <a href="http://www.pyc.edu.hk/~chin/reader/index.html" target="_blank">
    <img src='img/link/chin.jpg' class="img-rounded link" alt="小讀者園地">
  </a>
  <br>
  <a href="https://www2.pyc.edu.hk/pycnet/" target="_blank">
    <img src="img/link/pycnet.jpg" class="img-rounded link" alt="PYCnet">
  </a>
</div>
</article>
<footer class="row">
  <div class="copyright col-md-5">
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </div>
</footer>
</body>
</html>