<?php
	header("Content-type: text/html; charset=UTF-8");
	error_reporting(0);

	$db_host = "127.0.0.1";
	$datebase = "library";
	$user ="root";
	$pass = "";
	
	$conn = mysql_connect($db_host,$user,$pass) or die("数据库连接失败，请检查数据库的配置");
	$select_db = mysql_select_db($datebase,$conn);
	
	if(!$select_db){
		die("无相关数据，请选择正确的数据库！");
		}
	mysql_query("set names utf8");
	
	$user_v = $_POST["user"];
	$gender_value = $_POST["gender"];
	$uAge_value =$_POST["uAge"];
	$pwd_valu = $_POST["pwd"];
	$addressName_value = $_POST["addressName"];
	$pName_value = $_POST["Pname"];
	$UID_value = $_POST["UID"];
	
	$updateq = "update librarion set libName='".$user_v."',sex='".$gender_value."',age='".$uAge_value."',pass='".$pwd_valu."',address='".$addressName_value."',place='".$pName_value."' where id = '".$UID_value."';";
	
	
	$update_end = mysql_query($updateq);
	
	mysql_free_result($update_end);
	
	mysql_close($update_end);

?>