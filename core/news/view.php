<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
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
<table class="table table-bordered">
<thead>
  <tr class="active">
    <th>Title</th>
    <th>類別</th>
    <th>發佈者</th>
    <th>時間</th>
    <th class='button'>Edit</th>
    <th class='button'>Delect</th>
  </tr>
</thead>
<tbody>
<?php
  $reply=mysql_query("SELECT * FROM `news`",$port);
  if(mysql_num_rows($reply)){
    while($result=mysql_fetch_assoc($reply)){
      echo '<tr>';
      printf("<td><a href='check.php?id=%d'>%s</a></td>",$result['id'],$result['title']);
      printf('<td>%s</td>',$result['type']);
      printf('<td>%s</td>',$result['username']);
      printf('<td>%s</td>',substr($result['postTime'],0,10));
      printf('<td><a href="edit.php?id=%d"><img src="../../img/button/edit.gif"></a></td>',$result['id']);
      printf('<td><a href="delete.php?id=%d"><img src="../../img/button/delete.jpg"></a></td>',$result['id']);
      echo '</tr>';
    }
  }else{
    echo '<tr><td colspan="6" class="danger">No Record Found</tr>';
  }
?>
</tbody>
</table>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>