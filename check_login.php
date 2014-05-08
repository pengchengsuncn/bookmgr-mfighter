<?php
	header("Content-type: text/html; charset=UTF-8");
	
	//接值
	error_reporting(0);
	$name = $_POST["userName"];
	$pwd = $_POST["password"];
	
	//连接
	$db_host="127.0.0.1";
	$database='library';
	$user='root';
	$pass='';
	$conn=mysql_connect($db_host,$user,$pass) or die("数据库连接出错,请检查数据库配置是否正确!");
	$select_db = mysql_select_db($database,$conn);
	if(!$select_db){
		die("无相关数据，请选择正确的数据库！");
	}
	//查询
	$qryStr = "select * from librarion where libName = '".$name."' and pass = '".$pwd."'";
	mysql_query("set names 'utf8'");
	$query = mysql_query($qryStr);
	$num = mysql_num_rows($query);//读出
	mysql_free_result($query);//结果集释放
	

	//判断：$num==0 判断用户名和密码不为空
	if($num == 0){
		echo "<script type='text/javascript'>";
		echo "alert('用户名或密码错误！');";
		echo "window.location.href='/';";//提交失败后返到当前页面
		echo "</script>";
	}else{
		session_start();//缓存开始
		$_SESSION["uName"] = $name;
		echo "<script type='text/javascript'>";
		echo "window.location.href='/main.php';";
		echo "</script>";
	}
	
	mysql_close();
?>

