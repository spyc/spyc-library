<?php
  session_start();
  require_once "../../inc/right/login.inc";
  require_once "../../SilverSnake/jQuery.php.php";
  require_once "../../Connection/port.php";
  # include "../../meta.php";
?><!DOCTYPE html>
<html>
<head>
<?php include "../../inc/head/core.inc";?>
<style>
  div.alert{
    display:none;
  }
</style>
<script>
  $(document).ready(function(){
    $("form").submit(function(){
      $(":password").val(md5($(":password").val()));
    });
    document.getElementById("username").focus();
    $(document.getElementById("produce")).click(function(){
       $.get("http://<?= $_SERVER["HTTP_HOST"] ?>/library/core/ajax/randomPassword.php", {length:8}, function(data){
       $(":password,#key").val(data);
       });
      document.getElementById("key").focus();
  }
    });
    $(":password").each(function(){
      $(this).change(function(){
        if($("#password").val()!=$("#password1").val()){
          $("#pw").show();
        }else{
          $("#pw").hide();
        }
      })
    });
    $(document.getElementById("username")).blur(function(){
      var result= false;
      $.ajax({
        url:"http://elearn.pyc.edu.hk/library/core/ajax/memberExists.php",
        method:"GET",
        data:{
          "username":$("#username").val()
        },
        success:function(data){
          if (data != 0) {
            $(".alert").text("Username is used!").addClass("alert-danger").slideDown();
            $(this).focus();
          } else {
            $(".alert").slideUp().removeClass("alert-danger");
          }
        }
      });
    });
  });
</script>
</head>
<body>
<header class="banner">
<?php include "../../inc/navbar/core.inc";?>
</header>
<article>
<div class="alert"></div>
<div class="container">
  <form method="post" action="add.php" autocomplete="off" class="form-horizontal" role="form">
    <h3>Add Member</h3>
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" name="username" id="username" class="form-control" required autofocus placeholder="Username">
      </div>
    </div>
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
      <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label for="pyc" class="col-sm-2 control-label">PYC Code</label>
      <div class="col-sm-10">
        <input type="text" name="pyc" id="pyc" class="form-control" required placeholder="PYC Code">
      </div>
    </div>
    <div class="form-group">
      <label for="right" class="col-sm-2 control-label">Right</label>
      <div class="col-sm-10">
        <select name="right" id="right" class="form-control">
          <optgroup label="Student">
            <option value=3 selected>Librarian</option>
            <option value=2>Chairmen</option>
            <option value="0">Tech</option>
            <?php if($_SESSION["user"]["right"]<=0){?>
              <option value="-1">Root</option>
            <?php } ?>
          </optgroup>
          <optgroup label="Teacher">
            <option value=1>Admin</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <label for="password1" class="col-sm-2 control-label">Confirm Password</label>
      <div class="col-sm-10">
        <input type="password" id="password1" class="form-control" required placeholder="Password Confirm">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Produce Password</label>
      <div class="sm-col-10 input-group">
        <input type="text" id="key" class="form-control">
        <span class="input-group-btn">
          <button type="button" id="produce" class="btn btn-default">
            Produce Password
          </button>
        </span>
      </div>
    </div>
    <div class="form-group">
      <input type="submit" value="Submit" class="btn btn-primary">
      <input type="reset" value="Reset" class="btn btn-primary">
    </div>
  </form>
</div>
</article>
<footer>
  <p class="copyright">
    Copyright © 2013 by Shatin Pui Ying College. All Rights Reserved.<br>
    版權所有　沙田培英中學
  </p>
</footer>
</body>
</html>
