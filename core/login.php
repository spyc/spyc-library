<?php
  ob_start();
  session_start();
  unset($_SESSION["user"]);
  require_once("../SilverSnake/jQuery.php.php");
  require_once("../inc/mysqli.php");
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allow");
    header("Location: signin.php");
    exit();
  }
  if (!isset($_POST["username"], $_POST["password"])) {
    header($_SERVER["SERVER_PROTOCOL"] . " 400 Bad Request");
    header("Location: signin.php?result=0");
    exit();
  }
  $sql = "SELECT * FROM `member` WHERE `username` = %s AND `password` = %s";
  $_POST["username"] = $dbh->quote($_POST["username"]);
  $_POST["password"] = $dbh->quote(md5($_POST["password"]));
  $stmt = $dbh->prepare(sprintf($sql, $_POST["username"], $_POST["password"]));
  $stmt->execute();
  if($stmt->rowCount() > 0){
    header("Location: index.php");
    mysqli_stmt_fetch($stmt);
    list($username, $hash, $name, $flag, $pycid) = $stmt->fetch(PDO::FETCH_NUM);
    $_SESSION["user"]=array(
      "username"=>$username,
      "id"=>$pycid,
      "name"=>$name,
      "right"=>$flag,
      "login"=>time()
    );
  } else {
    header("Location: signin.php?result=0");
  }
  ob_end_flush();
?>
