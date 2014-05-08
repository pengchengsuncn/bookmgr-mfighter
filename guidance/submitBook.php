<?php
	header("Content-type: text/html; charset=UTF-8");
	error_reporting(0);
	//用post得到input中的value
	$bname = $_POST["bName"];
	$mes = $_POST["message"];
	$date = $_POST["buyDate"];
	$writer = $_POST["writer"];
	$pri = $_POST["price"];
	$bT = $_POST["bookType"];
	//判断是否为空
	if(empty($bname)) {
    	$status = "N";
		$msg = "图书名不能为空！";
	}elseif(empty($mes)) {
    	$status = "N";
		$msg = "图书类型不能为空！";
	}elseif(empty($date)){
		$status = "N";
		$msg = "购买日期不能为空！";
	}elseif(empty($writer)){
		$status = "N";
		$msg = "作者不能为空！";
	}elseif(empty($pri)){
		$status = "N";
		$msg = "价格不能为空！";
	}elseif(empty($bT)){
		$status = "N";
		$msg = "种类不能为空！";
	}else{
		$status = "Y";
		$msg = "插入成功！";
	}
	
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
		
		$inStr = "insert into tbooks values ('','".$bname."','".$mes."','".$date."','".$writer."','".$pri."','".$bT."')";
		$query=mysql_query($inStr);
		
		mysql_free_result($query);
		mysql_close();
		
		echo '<script type="text/javascript">';
		echo 'alert("成功");';
		echo 'window.location.href = "addbook.php";';
		echo '</script>';
	}else{
		echo '<script type="text/javascript">';
		echo 'alert("'.$msg.'");';
		echo 'window.location.href = "addbook.php";';
		echo '</script>';
	}
	
	
