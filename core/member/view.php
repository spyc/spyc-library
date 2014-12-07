<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $right=array("Tech","Admin","Chairperson","Librarian");
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
<?php if (isset($_GET["action"], $_GET["result"])){?>
<div class="alert alert-<?= $_GET['result'] ? 'success' : 'danger' ?>">
  <?= ucfirst($_GET["action"]) . " " . $_GET['result'] ? 'success' : 'fail'?>
</div>
<?php } ?>
<table class="table table-bordered">
<thead>
  <tr class="active">
    <th>Name</th>
    <th>PYC code</th>
    <th>Right</th>
    <th class='button'>Edit</th>
    <th class='button'>Reset</th>
    <th class="button">Delete</th>
  </tr>
</thead>
<tbody>
<?php
  $sql=sprintf("SELECT * FROM `member` WHERE `jurisdiction` >=%d ORDER BY `jurisdiction`", $_SESSION["right"]);
  $reply=mysql_query($sql,$port);
  if(mysql_num_rows($reply)){
    while($result=mysql_fetch_assoc($reply)){
      echo "<tr>\n";
      printf("<td>%s</td>",$result['name']);
      printf('<td>%s</td>',$result['pycid']);
      echo '<td>' . $right[$result['jurisdiction']] . '</td>';
      printf("<td><a href='edit.php?id=%s&right=%d'><img src='../../img/button/edit.gif' width=30 height=30></a></td>",$result['pycid'],$result['jurisdiction']);
      printf("<td><a href='reset.php?id=%s&right=%d'><img src='../../img/button/reset.jpg' width=30 height=30></a></td>",$result['pycid'],$result['jurisdiction']);
      printf('<td><a href="delete.php?id=%s&right=%d"><img src="../../img/button/delete.jpg" width=30 height=30></a></td></tr>',$result['pycid'],$result['jurisdiction']);
      echo "\n</tr>\n";
  }
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
<?php mysql_free_result($reply); ?>