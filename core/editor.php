<?php
  ob_start();
  session_start();
  require_once "../inc/right/login.inc";
  require_once "../SilverSnake/jQuery.php.php";
  require_once "../Connection/port.php";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "htmlpurifier/library/HTMLPurifier.auto.php";
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $content = $purifier->purify($_POST["content"]);
    $fp=fopen('../'.$_POST['folder'].'/'.$_POST['file'].'.inc','w');
    fputs($fp,$_POST['content']);
    fclose($fp);
  }
?><!DOCTYPE html>
<html>
<head>
<?php include "../inc/head/core.inc";?>
  <script src="http://<?= $_SERVER["HTTP_HOST"] ?>/console/cdn/ckeditor/ckeditor.js"></script>
</head>
<body>
<header class="banner">
<?php include "../inc/navbar/core.inc";?>
</header>
<article>
  <form method="post" class="form-inline" role="form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<label for='content'><?= ucfirst($_REQUEST['file']) ?>: </label>
<br>
<textarea name='content' class='ckeditor' id='content'><?php
  $fp=fopen('../'.$_REQUEST['folder'].'/'.$_REQUEST['file'].'.inc','r');
  while(!feof($fp))
    echo fgets($fp);
  fclose($fp);
?></textarea>
<input type="hidden" name="file" value="<?= $_REQUEST['file'] ?>">
<input type="hidden" name="folder" value="<?= $_REQUEST['folder'] ?>">
<button type="submit" class="btn btn-primary">Edit</button>
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
<?php ob_end_flush(); ?>