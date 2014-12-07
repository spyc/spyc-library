<?php
  ob_start();
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $content=array();
  $sql="SELECT * FROM `ranking` WHERE `board`='class'";
  $result=mysql_query($sql,$port);
  if($result&&mysql_num_rows($result)){
    while($data=mysql_fetch_array($result)){
      $content[$data[1]]=$data[4];
    }
  }
  mysql_free_result($result);
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<script>
$(doc).ready(function(){
  $("table input").attr({
    placeholder:"本數",
    min:0,
    step:1
  }).addClass("form-control").filter(":first").focus();
});
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<div class="container">
  <form action="class.php" method="post" class="form-inline">
    <label for="month">Month: </label>
    <input type="month" name="month" id="month" value="<?= date("Y-n",time()-2592000) ?>">
    <table class="table table-bordered">
      <thead>
        <tr class="active">
          <th>Class</th>
          <th>本數</th>
        </tr>
      </thead>
      <tbody>
<?php
  $sql="SELECT DISTINCT `class` FROM `student`";
  $result=mysql_query($sql,$port);
  $class=array();
  while($data=mysql_fetch_array($result)){
    $class[]=$data[0];
    $content[$data[0]]=isset($content[$data[0]])?$content[$data[0]]:0;
  }
  foreach($class as $v){
    echo "<tr>\n";
    printf("<td>%s</td>",$v);
    printf("<td><input type=\"number\" name=\"content[%s]\"></td>",$v);
    echo "\n</tr>\n";
  }
  mysql_free_result($result);
?>
      </tbody>
    </table>
    <div class="row">
      <input type="submit" class="btn btn-primary btn-lg" value="Submit">
    </div>
  </form>
</div>
</body>
</html>
<?php ob_end_flush(); ?>