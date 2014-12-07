<?php
  $conn = @mysqli_connect("######", "######", "######", "######") or die();
  mysqli_query($conn, "SET NAMES UTF8");
  mysqli_query($conn, "CHARACTER SET UTF8");
  mysqli_query($conn, "SET CHARACTER_SET_CLIENT = UTF8");
  mysqli_query($conn, "SET COLLATION_CONNECTION = utf8_unicode_ci");
  mysqli_query($conn, "SET CHARACTER_SET_RESULTS = UTF8");
  mysqli_query($conn, "SET CHARACTER_SET_SERVER = UTF8");
  mysqli_query($conn, "SET CHARACTER_SET_CONNECTION = UTF8");
  $dbh = new PDO("mysql:host=######;dbname=######;charset=UTF8", "######", "######");
?>