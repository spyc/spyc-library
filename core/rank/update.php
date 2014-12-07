<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $_GET['rank']=isset($_GET['rank'])?$_GET['rank']:'book';
  if($_GET["rank"]=="class"){
    header("Location : class_rank.php");
  }
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<script>
$(document).ready(function(){
  $('select').val('<?= $_GET['rank'] ?>').change(function(){
    $('#board').submit();
  });
  $("input").not(":submit,:reset,[type=month]").addClass("form-control");
});
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
  <h3>Update</h3>
  <form method='get' id='board'>
    <label for='rank'>類别: </label>
    <select name='rank'>
      <option value="book">書籍</option>
      <option value="personal">個人</option>
      <option value="class">班別</option>
  </select>
  </form>
  <form method='post' action='change.php'>
    <input type='hidden' name='board' value='<?= $_GET['rank'] ?>'>
    <input type='month' name='month' value='<?= date("Y-n",time()-2592000) ?>'>
    <table class='table table-bordered'>
      <thead>
        <tr class="acive">
          <th class='button'>排名</th>
          <th><?= $_GET['rank']=='personal'?"Class":"書籍" ?></th>
          <th><?= $_GET['rank']=='personal'?'Class No.':'ISBN' ?></th>
          <th><?= $_GET['rank']=='personal'?'次數':'本數' ?></th>
        </tr>
      </thead>
      <tbody>
<?php
  for($i=1;$i<=10;$i++){
    $sql=sprintf("SELECT * FROM `ranking` WHERE `board`=%s AND `rank`=%d",SQLformatString($_GET['rank'],'text'),SQLformatString($i,'int'));
    $result=mysql_query($sql,$port);
    $data=mysql_fetch_array($result);
    if($_GET["rank"]=="personal"){
      $sql=sprintf("SELECT `class`,`class no` FROM `student` WHERE `pycid`=%s",SQLformatString($data[0],"text"));
      $student=mysql_query($sql,$port);
      $detail=mysql_fetch_array($student);
      mysql_free_result($student);
    }else{
      $detail=array($data[1],$data[0]);
    }
    echo "<tr>\n";
    echo "<td>".$i."</td><td>";
    printf("<input type=\"text\" name=\"name[%d]\" value=\"%s\">",$i,$detail[0]);
    echo "</td><td>";
    printf("<input type=\"text\" name=\"detail[%d]\" value=\"%s\">",$i,$detail[1]);
    echo "</td><td>";
    printf("<input type=\"number\" name=\"content[%d]\" value=\"%d\">",$i,$data[4]);
    echo "</td>\n</tr>\n";
    mysql_free_result($result);
  }
?>
      </tbody>
    </table>
    <input type='submit' value='Submit' class="btn btn-primary">
    <input value='Reset' type='reset' class="btn btn-primary">
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