<?php
	function stylesheet($src){
		printf("<link href='%s' type='text/css' rel='stylesheet' />\n",$src);
	};
	function script($src){
		printf("<script src='%s'></script>\n",$src);
	};
	function SQLformatString($theValue,$theType,$theDefinedValue="",$theNotDefinedValue=""){
		if(PHP_VERSION<6){
			$theValue=get_magic_quotes_gpc()?stripslashes($theValue): $theValue;
		}
		$theValue=function_exists('mysql_real_escape_string')?mysql_real_escape_string($theValue):mysql_escape_string($theValue);
		switch($theType){
			case 'search':
				$theValue=($theValue!="")?"%" . $theValue . "%":"NULL";
			case "text":case "date":
				$theValue=($theValue!="")?"'" . $theValue . "'":"NULL";
			break;    
			case "long":case "int":
				$theValue=($theValue!="")?intval($theValue):"NULL";
			break;
			case "double":
				$theValue=($theValue!="")?doubleval($theValue):"NULL";
			break;
			case "defined":
				$theValue=($theValue!="")?$theDefinedValue:$theNotDefinedValue;
			break;
		}
		return $theValue;
	};
	function curURL(){
		$pageURL =(!empty($_SERVER['HTTPS'])&&('on'== $_SERVER['HTTPS']))?'https://':'http://';
  		$pageURL .=$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];	
 		return $pageURL;
	};
	function string2bool($str){
		return ($str=='true'||$str=='false')?($str==='true'):$str;
	};
	function js($str){
		printf("<script>%s</script>\n",$str);
	};
	function pre_print_r($expression){
		echo '<pre>';
		print_r($expression);
		echo '</pre>';
	};
	function charAt($str,$index){
		return substr($str,$index,1);
	};
	function substring($str,$start,$end){
		if($start>$end){
			$tmp=$end;
			$end=$start;
			$start=$tmp;
			unset($tmp);
		}
		return substr($str,$start,$end-$start);
	}
?>