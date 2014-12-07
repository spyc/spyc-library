<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $news=array();
  $input=array("title","type","content");
  foreach($input as $v)
    $news[$v]=isset($_SESSION["news"][$v])?$_SESSION["news"][$v]:"";
  unset($_SESSION["news"]);
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
  <script src="http://<?= $_SERVER["HTTP_HOST"] ?>/console/cdn/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function(){
  $('select#typeList').change(function(){
    $('input#type').val($(this).val());
  });
  $('input:button#upload').click(function(){
    var from=['time','title','type'],to=['timestamp','subject','select'];
    for(i=0;i<from.length;i++)
      $('input#'+to[i]).val($('input#'+from[i]).val());
    $('input#detail').val(CKEDITOR.instances.content.getData());
    $('form#file').submit();
  });
});
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<form method="post" class="form-horizontal" action="add.php" id="data">
  <h3>Edit News</h3>
  <div class="form-group">
    <label for="time" class="col-sm-2 control-label">Time</label>
    <div class="col-sm-10">
      <input type="datetime-local" name="time" id="time" required>
    </div>
  </div>
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-9">
      <input type="text" name="title" id="title" class="form-control" value="<?= $news["title"] ?>" required placeholder="Title">
    </div>
  </div>
  <div class="form-group">
    <label for="typeList" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-9 input-group">
      <div class="input-group-btn">
        <select id="typeList" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          <option value="一般事項">一般事項</option>
          <option value="新書上架">新書上架</option>
          <option value="校內活動宣傳">校內活動宣傳  </option>
          <option value="校內活動花絮">校內活動花絮</option>
          <option value="校外活動宣傳">校外活動宣傳</option>
          <option value="校外活動花絮">校外活動花絮</option>
        </select>
      </div>
      <input name="type" id="type" type="text" class="form-control" required value="<?= $news["type"] ?>" placeholder="Type">
    </div>
  </div>
  <div>
    <label for="content" class="control-label col-sm-1">內容</label>
    <br>
    <div class="col-sm-11">
      <textarea cols="30" rows="10" class="ckeditor" name="content" id="content"><?= $news["content"] ?></textarea>
    </div>
  </div>
</form>
  <div class="container">
    <form method='post' enctype='multipart/form-data' action="upload.php" id='file'>
    <div class="form-group">
      <label for='photo' class="col-sm-2">圖片: </label>
      <div class="col-sm-9">
        <input type='file' name='photo' class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <input type='hidden' id='timestamp' name='time'>
    <input type='hidden' id='subject' name='title'>
    <input type='hidden' name='type' id='select'>
    <input type='hidden' name='content' id='detail'>
    <div class="form-group col-sm-2">
      <input type='button' value='Upload' id='upload' class="btn btn-primary">
    </div>
    </form>
  </div>
  <div class="row">
    <div class="col-md-5">
<?php
if(isset($_SESSION["photo"])&&is_array($_SESSION["photo"])){
foreach($_SESSION["photo"] as $v)
  echo "<a href=\"../../news/".$v."\">".$v."</a>";
}
?>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" value="Submit" form="data" class="btn btn-primary">
    <input type="reset" value="Reset" form="data" class="btn btn-primary">
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