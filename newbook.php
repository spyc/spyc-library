<?php
  require_once "SilverSnake/jQuery.php.php" ;
  require_once "Connection/port.php";
  $_SESSION["right"]=256;
  $_GET["p"]=isset($_GET["p"])?$_GET["p"]:0;
?><!DOCTYPE html>
<html>
<head>
<?php include "inc/head/default.inc";?>
<script>
$(function(){
  $('select:first').val("<?= $_GET['lang']?>").change(function(){
    $('form').submit();
  });
  var p=<?= isset($_GET["p"])?$_GET["p"]:1 ?>,m=10;
    $("a.pervious").attr("href","newbook.php?p="+(p-1));
    $("a.next").attr("href","newbook.php?p="+(p+1));
    if(p==1)
      $("a.pervious").attr("href","#");
    if(p==m)
      $("a.next").attr("href","#");
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
<form method="get" style='text-align:center;'>
  <select name="lang">
        <option value="eng">English</option>
        <option value="ch">中文</option>
    </select>
</form>
<ul class="pager">
  <li class="pervious"><a href="#" class="pervious">Previous</a></li>
  <li class="pervious"><a href="#" class="next">Next</a></li>
</ul>
<?php if(isset($_GET['lang'])){ ?>
<table class="table table-bordered" style="text-algin:center;">
<thead>
  <tr>
      <th><?= ($_GET['lang']=='ch')?'書名':'Title' ?></th>
        <th><?= ($_GET['lang']=='ch')?'作者':'Author' ?></th>
        <th><?= ($_GET['lang']=='ch')?'索書號':'Call Number' ?></th>
        <th><?= ($_GET['lang']=='ch')?'封面':'Cover' ?></th>
        <th><?= ($_GET['lang']=='ch')?'簡介':'Introduction' ?></th>
</thead>
<tbody>
<?php
  $sql=sprintf("SELECT * FROM `book` WHERE `lang`=%s LIMIT %d , 30",SQLformatString(($_GET['lang']=='ch')?'zh':'en','text'),$_GET["p"]);
  $reply=mysql_query($sql,$port);
  if(mysql_num_rows($reply)){
  while($result=mysql_fetch_assoc($reply)){
    echo "<tr>";
    printf("<td><a href=\"book_report.php?b=%d\">%s</a></td>\n",$result["id"],$result['title']);
    printf("<td>%s</td>\n",$result['author']);
    printf("<td>%s</td>\n",$result['callNo']);
    printf("<td><img src='book/%s' /></td>",$result['cover']);
    printf("<td>%s</td>\n",$result['intro']);
    echo "</tr>";
  }
  }else{
    echo "<tr><td class=\"danger\" colspan=\"5\">No Book</td></tr>";
  }
  mysql_free_result($reply);
?>
</tbody>
</table>
<?php }?>
<ul class="pager">
  <li class="pervious"><a href="#" class="pervious">Previous</a></li>
  <li class="pervious"><a href="#" class="next">Next</a></li>
</ul>
</article>
<footer>
  <p class='copyright'>
    Copyright &copy; 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>