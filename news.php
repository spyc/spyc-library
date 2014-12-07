<?php
  require_once "SilverSnake/jQuery.php.php";
  require_once "Connection/port.php";
  $_SESSION["user"]['right']=256;
?><!DOCTYPE html>
<html>
<head>
<?php include "inc/head/default.inc";?>
<script>
  $(document).ready(function(){
    var p=<?= isset($_GET["p"])?$_GET["p"]:1 ?>,m=10;
    $("a.pervious").attr("href","news.php?p="+(p-1));
    $("a.next").attr("href","news.php?p="+(p+1));
    if(p==1)
      $(".pervious").attr("href","#");
    if(p==m)
      $(".next").attr("href","#");
  });
</script>
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
<article>
<ul class="pager">
  <li class="pervious"><a href="#" class="pervious">Previous</a></li>
  <li class="pervious"><a href="#" class="next">Next</a></li>
</ul>
<table class="table table-bordered" style="text-algin:center;">
<thead>
  <tr>
    <th>日期</th>
    <th>事宜</th>
    <th>類別</th>
  </tr>
</thead>
<tbody>
<?php
  $sql=sprintf("SELECT * FROM `news` LIMIT %d, 10",isset($_GET["p"])?($_GET["p"]-1)*10:0);
  $result=mysql_query($sql,$port);
  if(mysql_num_rows($result)){
    while($data=mysql_fetch_array($result)){
      echo "<tr>\n\t";
      echo "<td>" . substr($data[1],0,10) . "</td>";
      echo "<td><a href=\"news_report.php?n=" . $data[0] . "\">" . $data[2] . "</a></td>";
      echo "<td>" . $data[3] . "</td>";
      echo"\n</tr>\n";
    }
  }else{
    echo "<tr class=\"danger\"><td colspan=\"3\">No News</td></tr>";
  }
?>
</tbody>
</table>
<form method='get'>
  <ul class="pager">
    <li><a href="#" class="pervious">Previous</a></li>
    <li><a href="#" class="next">Next</a></li>
  </ul>
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