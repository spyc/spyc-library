<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $_GET['lang']=isset($_GET['lang'])?$_GET['lang']:'zh';
  $book=array();
  $input=array("title","author","callNo","isbn","intro","rmc","cover");
  foreach($input as $v){
    $book[$v]=isset($_SESSION["book"][$v])?$_SESSION["book"][$v]:"";
  }
  $book["cover"]=($book["cover"]!="")?$book["cover"]:"unknown.jpg";
  unset($_SESSION["book"]);
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<script>
$(document).ready(function(){
  $('#lang').val('<?= $_GET['lang'] ?>');
  $('#title').focus();
  $("form#book>div").not("#intro-content").addClass("form-group").find("label").addClass("col-sm-2 control-label").next("div").addClass("col-sm-10").find("select,input").addClass("form-control");
  $('form#file :button').click(function(){
    var from=['title','callNo','isbn',"author","rmc"],to=['header','call','barcode',"writer","id"];
    for(i=0;i<from.length;i++)
      $('input#'+to[i]).val($('input#'+from[i]).val());
    $('#iso').val($('select').val());
    $('input#content').val(CKEDITOR.instances.intro.getData());
    $('form#file').submit();
  });
});
</script>
  <script src="/console/cdn/ckeditor/ckeditor.js"></script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
    <h3>Add Book</h3>
    <form action="add.php" method="post" id="book" class="form form-horizontal">
      <div>
        <label for="lang">Language: </label>
        <div>
          <select name="lang" id="lang">
            <option value="zh">中文</option>
            <option value="en">English</option>
          </select>
        </div>
      </div>
      <div>
        <label for='title'>Title: </label>
        <div>
          <input type="text" name="title" id="title" autofocus required placeholder=" Title" value="<?= $book["title"] ?>">
        </div>
      </div>
      <div>
        <label for='author'>Author: </label>
        <div>
          <input type="text" name="author" id="author" required placeholder="Author" value="<?= $book["author"] ?>">
        </div>
      </div>
      <div>
        <label for='callNo'>Call Number: </label>
        <div>
          <input type="text" name="callNo" id='callNo' required placeholder="Call Number" value="<?= $book["callNo"] ?>">
        </div>
      </div>
      <div>
        <label for="isbn">ISBN: </label>
        <div>
          <input type="text" maxlength="13" name="isbn" id="isbn" required placeholder="ISBN" value="<?= $book["isbn"] ?>">
        </div>
      </div>
      <div>
        <label for="rmc">RCN: </label>
        <div>
          <input type="text" maxlength="4" name="rmc" id="rmc" required placeholder="RCN" value="<?= $book["rmc"] ?>">
        </div>
      </div>
      <div id="intro-content">
        <label for='intro' class="control-label">&emsp;Introduction</label><br>
          <textarea class="ckeditor" rows="10" cols="30" name="intro" id="intro"></textarea>
        <input type='hidden' name='cover' value='<?= $book["cover"] ?>'>
      </div>
      </form>
       <div class="container">
          <h4>Cover</h4>
          <img src="../../book/<?= $book['cover'] ?>">
        </div>
      <form class="form-inline" method="post" enctype="multipart/form-data" action="upload.php" id="file">
        <div class="form-group">
          <label for='file' class="sr-only">Book Cover:</label>
          <input type='file' name='file' id='file' class="form-control" placeholder="File">
        </div>
          <input type='button' value='Upload' id='upload' class="btn btn-primary">
          <input type="hidden" name="lang" id="iso"><input type="hidden" name="title" id="header"><input type="hidden" name="callNo" id="call"><input type="hidden" name="isbn" id="barcode"><input type="hidden" name="intro" id="content"><input type="hidden" name="author" id="writer"><input type="hidden" name="rmc" id="id">
  </form><br>
        <input type="submit" value="Submit" form='book' class="btn btn-primary">
        <input type='reset' value="Reset" form='book' class="btn btn-primary">
</article>
<footer>
  <p class='copyright'>
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
