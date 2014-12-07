<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("SELECT * FROM `book` WHERE `id`=%d",$_GET['id']);
  $book=mysql_fetch_assoc(mysql_query($sql,$port));
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
  <script src="//<?= $_SERVER["HTTP_HOST"] ?>/pydio/data/personal/console/cdn/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function(){
  $("select:first").not(":last").val("<?= $book["lang"]?>");
  $("form>div").addClass("form-group").find("label").addClass("col-sm-2 control-label").next("div").addClass("col-sm-10").find("select,input").addClass("form-control");
});
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<form action="change.php" method="post" class="form-horizontal">
  <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
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
        <label for="rmc">RMC: </label>
        <div>
          <input type="text" maxlength="4" name="rmc" id="rmc" required placeholder="RMC" value="<?= $book["rmc"] ?>">
        </div>
      </div>
      <div id="intro-content">
        <label for='intro' class="control-label">Introduction: </label><br>
        <div class="col-sm-10">
          <textarea class="ckeditor" rows="10" cols="30" name="intro"><?= $book["intro"] ?></textarea>
        </div>
        <input type='hidden' name='cover' value='<?= $book["cover"] ?>'>
      </div>
  <div class="row">
    <div class="col-sm-1">
      <input type='submit' value="Submit" class="btn btn-primary">
    </div>
    <div class="col-sm-1">
      <input type='reset' value="Reset" class="btn btn-primary">
    </div>
  </div>
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