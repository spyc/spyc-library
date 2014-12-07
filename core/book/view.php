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
        <th>語言</th>
        <th>標題</th>
        <th>索書號</th>
        <th>ISBN</th>
        <th class="button">Edit</th>
        <th class='button'>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $reply=mysql_query("SELECT * FROM `book`",$port);
        if(mysql_num_rows($reply)){
        while($result=mysql_fetch_assoc($reply)){
          echo "<tr>";
          printf("<td>%s</td>",$result['lang']=='en'?'English':'中文');
          printf('<td><a href="check.php?id=%d">%s</a></td>',$result['id'],$result['title']);
          printf('<td>%s</td>',$result['callNo']);
          printf('<td>%s</td>',$result['isbn']);
          printf("<td><a href='edit.php?id=%d'><img src='../../img/button/edit.gif'></a></td>",$result['id']);
          printf("<td><a href='delete.php?id=%d'><img src='../../img/button/delete.jpg'></a></td>",$result['id']);
          echo "</tr>\n";
        }
        }else{
          echo '<tr><td colspan=6 class="danger">No Record Found</td></tr>';
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
<?php
  mysql_free_result($reply);
?>