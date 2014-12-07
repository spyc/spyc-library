<?php
  if(!isset($_SESSION["user"])){
    header("Location:http://elearn.pyc.edu.hk/library/core/signin.php");
  }
?>