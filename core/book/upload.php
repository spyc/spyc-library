<?php
  ob_start();
  session_start();
  foreach($_POST as $k => $v)
    $_SESSION["book"][$k]=$v;
  if(isset($_FILES['file'])&&$_FILES['file']['error']==0){
    $s=move_uploaded_file($_FILES['file']['tmp_name'],'../../book/'.$_FILES['file']['name']);
    $_SESSION["book"]['cover']=$_FILES['file']['name'];
  }
  header('Location:input.php?upload=' . $s . "&lang=".$_SESSION["book"]["lang"]);
  ob_end_flush();
?>