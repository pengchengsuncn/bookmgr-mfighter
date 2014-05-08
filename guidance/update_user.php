<?php
	header("Content-type: text/html; charset=UTF-8");
	error_reporting(0);
	
	$db_host="127.0.0.1";
	$database='library';
	$user='root';
	$pass='';
	
	$conn=mysql_connect($db_host,$user,$pass) or die("数据库连接出错,请检查数据库配置是否正确!");
	$select_db = mysql_select_db($database,$conn);
	
	if(!$select_db){
					die("无相关数据，请选择正确的数据库！");
				}
				
	mysql_query("set names utf8");
	$userId = $_GET["userId"];			
	$uStr = "select * from librarion where id='".$userId."'";
	$result = mysql_query($uStr);
	
	$row =mysql_fetch_array($result);
	
	mysql_free_result($row);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/backstage.css" />
<link rel="stylesheet" type="text/css" href="../style/foundation.min.css" />
<title>无标题文档</title>
</head>

<body>
	<div id="container" class="admin">
	<table border="1" width="100%" align="center">
		<tr>
			<th colspan="4">图书管理系统</th>
		</tr>
	</table>
		<dl class="sub-nav">
			<dd class="active"><a href="main.php">本馆首页</a></dd>
			<dd><a href="">热点书刊</a></dd>
			<dd><a href="admin.php">操作管理</a></dd>
			<dd><a href="">销售信息</a></dd>
		</dl>
	
	<div id="content">
		<div id="menu">
			<ul>
					<li><a href="addUser.php">添加用户</a></li>
					<li><a href="addbook.php">添加图书</a></li>
					<li><a href="findBook.php">查找图书</a></li>
					<li><a href="findUser.php">查找用户</a></li>
			</ul>
		</div>
		<div id="formTab">
		
			<form action="updateU.php" method="post" id="form">
				<table  width="500" align="center" class="update-user-tbl">
					<caption><h3>更新用户</h3></caption>
					<tr>
						<td><label class="radius secondary label" for="user">用户名：</label></td>
						<td><input type="text" name="user" value="<?php echo $row["libName"] ?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="gender">性　别：</label></td>
						<td><input type="text" name="gender" value="<?php echo $row["sex"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="uAge">年　龄：</label></td>
						<td><input type="text" name="uAge" value="<?php echo $row["age"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="pwd">密　码：</label></td>
						<td><input type="text" name="pwd" value="<?php echo $row["pass"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="addressName">地　址：</label></td>
						<td><input type="text" name="addressName" value="<?php echo $row["address"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="Pname">籍　贯：</label></td>
						<td><input type="text" name="Pname" value="<?php echo $row["place"]?>" /></td>
					</tr>
					<tr>
						<td><input type="hidden" name="UID" value="<?php echo $row["id"]?>" /></td>
						<td><input type="submit" name="sub" class="medium secondary button" value="提交" /> </td>
					</tr>
				</table>
			</form>
		
		</div>
			
	</div>	
	<div id="add" style="float:right;"></div>			
</div>
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate-1.9.0.min.js"></script>
<script src="../js/foundation.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
		$(document).foundation();
		add();
		
		$("form").validate({
			rules: {
				user: "required",
				gender: {
					required:true	
				},
				uAge: {
					required:true,
					number:true
				},
				addressName: {
					required:true,
					maxlength:20	
				},
				Pname: {
					required:true	
				}
			},
			messages: {
				user: "请输入图书名称！",
				gender: "请选择其中一个",
				uAge: "请输入数字",
				addressName: "最大长度不能超过20",
				Pname: "请正确输入"
			},
			submitHandler:function(form){
				form.submit();
			}
		});
		
		
	});

	
	function add(){
		  var d = new Date();
		  document.getElementById('add').innerHTML = d.getFullYear()+"年"+(d.getMonth()+1)+"月"+d.getDate()+"日 "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
		  setTimeout("add()",1000);
	}
</script>
</body>
</html>