<?php
  require_once "SilverSnake/jQuery.php.php";
  require_once "Connection/port.php";
  $_SESSION['right']=256;
  $month=array('','一','二','三','四','五','六','七','八','九','十','十一','十二');
  if($_GET["rank"]=="class"){
    header("Location:graph.php");
  }
?><!DOCTYPE html>
<html>
<head>
<?php include "inc/head/default.inc";?>
<script>
$(function(){
  $('select').change(function(){
    $('form').submit();
  }).val('<?= isset($_GET['rank'])?$_GET['rank']:'' ?>');
});
</script>
</head>
<body>
<header class="banner">
<?php include "inc/navbar/default.inc"; ?>
</header>
<article>
<form method="get" style="text-align:center;">
  <select name='rank'>
      <option value='book'>書籍</option>
        <option value='personal'>個人</option>
    <option value="class">班別</option>
    </select>
</form>
<?php
  $sql=sprintf("SELECT * FROM `ranking` WHERE `board`=%s LIMIT 10",SQLformatString($_GET['rank'],'text'));
  $reply=mysql_query($sql,$port);
?>
<table class="table table-bordered" style="text-algin:center;">
  <thead>
      <tr>
          <th>排名</th>
          <th><?= $_GET['rank']=='book'?'書名':'姓名' ?></th>
            <th>次數</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      while($result=mysql_fetch_assoc($reply)){
        echo "<tr>\n";
        printf("<td>%d</td>\n<td>",$_GET["rank"]=="class"?$i++:$result['rank']);
        echo $result['name'];
        printf("</td>\n<td>%d</td>\n",$result['content']);
        echo "</tr>\n";
        $for=$result['month'];
      }
    ?>
    </tbody>
  <h3><?= $month[$for] ?>月<?= $_GET['rank']=='book'?'最受歡迎':'學生借閱' ?>書籍排名榜</h3>
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