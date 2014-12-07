<!DOCTYPE html>
<html>
<head>
<?php include "../inc/head/default.inc";?>
<style>
    .form-control{
        max-width: 50%;
    }
</style>
<script>
$(document).ready(function(){
  $('#username').focus();
  $('.form-control').css('max-width','50%');
  $('form').submit(function(){
    $(':password').val(md5($('#password').val()));
    $(':submit');
  });
});
</script>
</head>
<body>
<header class='banner'>
  <div class='title'>Library</div>
</header>
<article>
<div class="container">
  <form method="post" action="login.php" class="form-horizontal" role="signin-form" autocomplete="off">
  <h3>Signin</h3>
  <div class="from-group">
    <label for="username" class="col-sm-2">Username</label>
    <div class="col-sm-10">
      <input type='text' name='username' id='username' class="form-control" autofocus required placeholder="Username">
    </div>
  </div>
  <div class="from-group">
    <label for="password" class="col-sm-2">Password</label>
    <div class="col-sm-10">
      <input type='password' name='password' id='password' required class="form-control" placeholder="Password">
    </div>
  </div>
  <div class="from-group">
    <input type='submit' value='Submit' class="btn btn-primary">
    <input type='reset' value='Reset' class="btn btn-primary">
  </div>
</form>
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
