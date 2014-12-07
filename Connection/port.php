<?php
# Type="MYSQL"
# HTTP="true"
$hostname_port = "#######";
$database_port = "#######";
$username_port = "#######";
$password_port = "#######";
$port = mysql_pconnect($hostname_port, $username_port, $password_port);
if($port){
mysql_select_db($database_port,$port);
mysql_query("SET NAMES 'utf8'");
}else{
  echo "SQL Connect Error";
}
?>