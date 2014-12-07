<?php
  session_start();
  //echo "<pre>\n";
  //print_r($_POST);
  foreach($_POST as $k => $v)
    $_SESSION["news"][$k]=$v;
  //print_r($_SESSION);$s=0;
  if(isset($_FILES["photo"])&&$_FILES["photo"]["error"]==0){
    $s=move_uploaded_file($_FILES["photo"]["tmp_name"],"../../news/".$_FILES["photo"]["name"]);
    $_SESSION["photo"][]=$_FILES["photo"]["name"];
  }
  //print_r($_FILES);
  //echo $s."<br>";
  header("Location:input.php?upload=".$s);
?>
</pre>
<a href="input.php?upload=<?=$s?>">Back</a>