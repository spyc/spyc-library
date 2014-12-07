<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  $sql=sprintf("SELECT * FROM `news` WHERE `id`=%d",$_GET['id']);
  $reply=mysql_query($sql,$port);
  $result=mysql_fetch_assoc($reply);
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<script src="//<?= $_SERVER["HTTP_HOST"] ?>/pydio/data/personal/console/cdn/ckeditor/ckeditor/ckeditor.js"></script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<form method="post" class="form-horizontal" action="change.php?id=<?= $_GET["id"]?>">
  <h3>Edit News</h3>
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" name="title" id="title" class="form-control" value="<?=$result["title"]?>" required placeholder="Title">
    </div>
  </div>
  <div class="form-group">
    <label for="typeList" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10 input-group">
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
      <input name="type" id="type" type="text" class="form-control" required value="<?= $result["type"] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="content">內容: </label><br>
    <textarea cols="30" rows="10" class="ckeditor" name="content" id="content"><?= $result["content"] ?></textarea>
  </div>
  <div>
    <input type="submit" value="Submit" class="btn btn-primary">
  </div>
<input type="hidden" value="<?= $_GET["id"] ?>"></form>
</article>
<footer>
  <p class="copyright">
    Copyright c 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
<?php mysql_free_result($reply);