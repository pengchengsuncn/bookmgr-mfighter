<?php

	header("Content-type: text/html; charset=UTF-8");
	error_reporting(0);
	//接入值 
	$name = $_POST["userName"];
	$gender=$_POST["sex"];
	$age = $_POST["age"];
	$sdr = $_POST["address"];
	$pl = $_POST["place"];
	
	//用empty()判断不为空
	if(empty($name)) {
    	$status = "N";
		$msg = "用户名不能为空！";
	}elseif(empty($gender)) {
    	$status = "N";
		$msg = "性别不能为空！";
	}elseif(empty($age)){
		$status = "N";
		$msg = "年龄不能为空！";
	}elseif(empty($sdr)){
		$status = "N";
		$msg = "地址不能为空！";
	}elseif(empty($pl)){
		$status = "N";
		$msg = "籍贯不能为空！";
	}else{
		$status = "Y";//声名一个变量并赋值
		$msg = "插入成功！";
	}
	
	//做一个判断，连接执行代码 
	if($status == "Y"){
		$db_host="127.0.0.1";
		$database='library';
		$user='root';
		$pass='';
		
		$conn=mysql_connect($db_host,$user,$pass) or die("数据库连接出错,请检查数据库配置是否正确!");
		$select_db = mysql_select_db($database,$conn);
			
		if(!$select_db){
			die("无相关数据，请选择正确的数据库！");
		}
		
		mysql_query("set names 'utf8'");
		
		$inStr = "insert into librarion values ('','".$name."','".$gender."','".$age."','','".$sdr."','".$pl."')";
		$query=mysql_query($inStr);
		
		mysql_free_result($query);//释放
		mysql_close();
		
		echo '<script type="text/javascript">';
		echo 'alert("成功");';
		echo 'window.location.href = "addUser.php";';
		echo '</script>';
	}else{
		echo '<script type="text/javascript">';
		echo 'alert("'.$msg.'");';
		echo 'window.location.href = "addUser.php";';
		echo '</script>';
	}
	
	
?>