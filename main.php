<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书管理系统</title>
<link rel="stylesheet" href="style/backstage.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../style/foundation.min.css" />
</head>

<body>


<div id="container">
	<table width="100%" align="center">
		
		<tr>
			<th colspan="4">图书管理系统</th>
	
		</tr>
		<tr><td>
	<?php 
	//缓存代码
	session_start();
	if(isset($_SESSION["uName"])){
		echo "欢迎".$_SESSION["uName"]."进入图书管理系统";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('请重新登录系统！');";
		echo "window.location.href='/';";
		echo "</script>";
	}
	?></td></tr>
	</table>
		<dl class="sub-nav">
			<dd class="active"><a href="main.php">本馆首页</a></dd>
			<dd><a href="">热点书刊</a></dd>
			<dd><a href="admin.php">操作管理</a></dd>
			<dd><a href="">销售信息</a></dd>
		</dl>
	
	<div id="content">
	

	</div>
	<div id="add"></div>
</div>

<script src="../js/foundation.min.js"></script>
<script type="text/javascript">
$(document).foundation();	
</script>
<script type="text/javascript">	
		function add(){
		  var d = new Date();
		  document.getElementById('add').innerHTML = d.getFullYear()+"年"+(d.getMonth()+1)+"月"+d.getDate()+"日 "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
		  setTimeout("add()",1000);
	}
	add();
</script>

</body>
</html>