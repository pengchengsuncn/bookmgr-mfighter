
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/backstage.css" />
<link rel="stylesheet" type="text/css" href="../style/foundation.min.css" />
<title>无标题文档</title>
</head>
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
				
				$uId=$_GET["bookId"];
				$uStr = "select * from tbooks where id='".$uId."'";
				$f_id = mysql_query($uStr);
				$row = mysql_fetch_array($f_id);
				
				mysql_free_result($row);

				
?>
<body>
	<div id="container" class="admin">
	<div id="nav">
	<dl class="sub-nav">
			<dd class="active"><a href="../main.php">本馆首页</a></dd>
			<dd><a href="">热点书刊</a></dd>
			<dd><a href="../admin.php">操作管理</a></dd>
			<dd><a href="">销售信息</a></dd>
		</dl>
	</div>
	<div id="content">
	<div id="menu">
		<ul class="side-nav">
			<li><a href="addUser.php">添加用户</a></li>
			<li><a href="addbook.php">添加图书</a></li>
			<li><a href="findBook.php">查找图书</a></li>
			<li><a href="findUser.php">查找用户</a></li>
		</ul>
	</div>
		<div id="formTab">
			<form id="Ftable" action="update.php" method="post">
				<table border="1" width="500" align="center" class="update-book-tbl">
					<caption><h3>更新图书</h3></caption>
					<tr>
						<td><label class="radius secondary label" for="book">书 名：</label></td>
						<td><input type="text" name="book" value="<?php echo $row["bName"] ?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="tName">类	 型:</label></td>
						<td><input type="text" name="tName" value="<?php echo $row["message"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="sName">销售时间：</label></td>
						<td><input type="text" name="sName" value="<?php echo $row["soldDate"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="wName">作 者：</label></td>
						<td><input type="text" name="wName" value="<?php echo $row["writer"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="pName">价 格：</label></td>
						<td><input type="text" name="pName" value="<?php echo $row["place"]?>" /></td>
					</tr>
					<tr>
						<td><label class="radius secondary label" for="nName">种 类：</label></td>
						<td><input type="text" name="nName" value="<?php echo $row["bookType"]?>" /></td>
					</tr>
					<tr>
						<td><input type="hidden" name="HID" value="<?php echo $row["id"]?>" /></td>
						<td><input type="submit" name="sub" class="medium secondary button" value="提交" /> </td>
					</tr>
				</table>
			</form>
		
		</div>
			
	</div>	
	<div id="add"></div>			
</div>
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate-1.9.0.min.js"></script>
<script src="../js/foundation.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
		$(document).foundation();
		add();
		
		$("#Ftable").validate({
			rules: {
				book: "required",
				tName:{
					required:true,
					maxlength:5    
				},
				sName: {
					dateISO:true
				},
				wName:{
					required:true
				},
				pName: {
					number:true
				},
				nName: {
					digits:true	
				}
			},
			messages: {
				book: "请输入图书名称！",
				tName: "请输入类型名称最大长度5",
				sName: "5——10个字符",
				wName: "请输入正确日期格式",
				pName: "请正确输入",
				nName: "请为整"
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