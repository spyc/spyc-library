<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $rank=isset($_GET['rank'])?$_GET['rank']:'book';
  if (isset($_GET["rank"]) && $_GET["rank"] == "class"){
    //header("Location: class_rank.php");
  }
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<script>
$(document).ready(function(){
  $('select').val('<?= $rank ?>');
  $('select').change(function(){
    $('form').submit();
  });
});
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<form method='get' style='text-align:center;'>
  <select name='rank'>
    <option value="book">書籍</option>
    <option value='personal'>個人</option>
    <option value="class">班別</option>
  </select>
</form>
<table class="table table-bordered">
  <thead>
    <tr class="active">
      <th class='button'>排名</th>
      <th><?= $rank=='class'?'班別':($rank=='personal'?'姓名':'書籍') ?></th>
      <th>本數</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql=sprintf("SELECT * FROM `ranking` WHERE `board`=%s ORDER BY `rank`,`content` %s",SQLformatString($rank,'text'),$rank=="class"?"DESC":"ASC");
    $reply=mysql_query($sql,$port);
    if(mysql_num_rows($reply)){
      while($result=mysql_fetch_assoc($reply)){
        echo "\t<tr>\n";
        printf("\t<td>%d</td>\n",$result['rank']);
        echo "\t<td>" . $result['name'] . "</td>\n";
        printf("\t<td>%d</td>\n",$result['content']);
        echo "\t</tr>\n";
      }
    }else{
      print("\t<td colspan='3' style='color:white;background-color:red;text-align:center;'>No Record Found</td>\n");
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
<?php ob_end_flush(); ?>