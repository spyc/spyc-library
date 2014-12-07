<?php
  require_once "SilverSnake/jQuery.php.php";
  require_once "Connection/port.php";
  $_SESSION['right']=256;
  $month=array('','一','二','三','四','五','六','七','八','九','十','十一','十二');
  $sql="SELECT `name`,`content`,`month` FROM `ranking` WHERE `board`='class' ORDER BY `name`";
  $result=mysql_query($sql,$port);
  $data=array();
  $color=array(
    array("FF0000","FF1919","E60000","E61616","FF3300","CC0000"),
    array("0000CC","3333FF","0000FF","000099","3333CC","003399"),
    array("00CC00","006600","33CC33","009933","009900","339966"),
    array("9900FF","993399","CC00FF","9933FF","6600CC","CC00CC"),
    array("FFCC00","FF9900","FF9933","FFCC66","FF6600","FF9966"),
    array("800000","990000","993333","990033","660033","993300")
  );
  while($tmp=mysql_fetch_array($result)){
    $for=$tmp[2];
    $data[$tmp[0]]=$tmp[1];
  }
  //echo mysql_num_rows($result);
  mysql_free_result($result);
?><!DOCTYPE html>
<html>
<head>
<?php include "inc/head/default.inc";?>
  <script src="//<?= $_SERVER["HTTP_HOST"] ?>/console/cdn/jquery/plugin/BarGraph/jqBarGraph-1.1.min.js"></script>
<script>
$(function(){
  var graph=[<?php
    $char="ABCDEFG";
    $str="";
    foreach($data as $i => $v){
      $str.= ",[";
      $str.= $v . ",'" . $i . "','#" . $color[intval($i)-1][strpos($char,substr($i,1))] . "'";
      $str.= "]";
    }
    print(substr($str,1));
?>];
  $("div#graph").jqBarGraph({
    data:graph,
    width:800
  });
});
</script>
</head>
<body>
<header class="banner">
<?php include "inc/navbar/default.inc"; ?>
</header>
<article>
<div class="container">
  <h3><?= $month[$for] ?>月班別借閱書籍排名榜</h3>
  <div id="graph"></div>
</div>
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
