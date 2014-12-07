<?php
  ob_start();
  if($_SERVER["REQUEST_METHOD"] != "GET"){
    header("HTTP/1.1 405 Method Not Allow");
    header("Allow: GET");
    exit();
  }
  header("Content-Type: text/plain");
  header("Cache-Control: no-store");
  header("Pragma: no-cache");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT");
  $len = isset($_GET["length"]) ? $_GET["length"] : 8;
  $password = "";
  $char = "qwertyuuiopasdfghjklzxcvbnm1234567890";
  $contentLength = strlen($char);
  for ($i = 0; $i < 36; $i++){
    $password .= $char[rand(0, $contentLength - 1)];
  }
  $seed = "f21c0d3e564c7db5ccf73c095a0b9371";
  $hash = hash_hmac("md5", $password, $seed);
  echo substr($hash, 0, $len);
  ob_end_flush();
?>