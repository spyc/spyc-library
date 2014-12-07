<?php
  session_start();
  require_once "../inc/right/login.inc";
  require_once "../SilverSnake/jQuery.php.php";
  require_once "../Connection/port.php";
  //include "../meta.php";
  $_GET["type"]=isset($_GET["type"])?$_GET["type"]:"id";
?><!DOCTYPE html>
<html>
<head>
<?php include "../inc/head/core.inc";?>
<script>
$(document).ready(function(){
  $(":hidden").val($("#<?=$_GET["type"]?>").attr("id"));
  $("#option").html($("#<?=$_GET["type"]?>").html());
  $("#content").attr("placeholder",$("#<?=$_GET["type"]?>").html());
});
</script>
</head>
<body>
<header class="banner">
<?php include "../inc/navbar/core.inc";?>
</header>
<article>
<div class="container">
<form method="get" class="form-inline">
  <input type="hidden" value="id" name="type">
  <div class="col-lg-7 input-group">
    <div class="input-group-btn">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id="option">PYC Code</span> <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="?type=id" id="id">PYC Code</a></li>
        <li><a href="?type=cne" id="cne">Chinese Name(Exact)</a></li>
        <li><a href="?type=cnk" id="cnk">Chinese Name(Keyword)</a></li>
        <li><a href="?type=ene" id="ene">English Name(Exact)</a></li>
        <li><a href="?type=enk" id="enk">English Name(Keyword)</a></li>
      </ul>
    </div>
    <input type="search" id="content" name="content" class="form-control" autofocus required placeholder="PYC Code">
    <span class="input-group-btn"><input type="submit" value="Seach" class="btn btn-primary"></span>
  </div>
</form>
</div>
<?php
if(isset($_GET['type'],$_GET['content'])&&$_GET['type']!=NULL&&$_GET['content']!=NULL){
  $type=$_GET['type'];
  $content=$_GET['content'];
  switch($type){
    case 'id':
      $sql=sprintf("SELECT DISTINCT * FROM `student` WHERE `pycid`=%s",SQLformatString($content,'text'));
    break;
    case 'cne':case 'ene':
      $sql=sprintf("SELECT DISTINCT * FROM `student` WHERE `%sname`=%s",substr($type,0,1),SQLformatString($content,'text'));
    break;
    case 'cnk':case 'enk':
      $sql=sprintf("SELECT  DISTINCT* FROM `student` WHERE `%sname` LIKE %s",substr($type,0,1),SQLformatString('%' . $content . '%','text'));
    break;
    case 'ccn':
      $sql=sprintf("SELECT  DISTINCT* `student` WHERE `class`=%s AND `class no`=%d",SQLformatString(strtoupper(substr($content,0,2)),'text'),SQLformatString(intval(substr($content,2)),'int'));
    break;
  }
  $result=mysql_query($sql."ORDER BY `pycid`",$port) or trigger_error('Not Found');
?>
<div class="row">
<div class="col-md-5">
<h2>Student Data (Record:<?= mysql_num_rows($result) ?>)</h2>
</div>
</div>
<div class="row">
<div class="col-md-12">
<table class="table table-bordered">
<thead>
  <tr class="active">
    <th>PYC Code</th>
    <th>Chinese Name</th>
    <th>English Name</th>
    <th>Class</th>
    <th>Class No.</th>
    <th>Sex</th>
  </tr>
</thead>
<tbody>
<?php
$print=0;
while($data=mysql_fetch_array($result)){
  echo "<tr>\n";
  echo "<td>" . $data[0] ."</td>";
  echo "<td>" . $data[4] ."</td>";
  echo "<td>" . $data[3] ."</td>";
  echo "<td>" . $data[1] ."</td>";
  echo "<td>" . $data[2] ."</td>";
  echo "<td>" . $data[5] ."</td>";
  echo "\n</tr>\n";
}
?>
</tbody>
</table>
</div>
</div>
<input type='button' value='Clear' id='clear' class="btn btn-info">
</div>
<?php } ?>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>