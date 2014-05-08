<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/backstage.css" />
<link rel="stylesheet" type="text/css" href="../style/foundation.min.css" />
<title>查找图书</title>
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
</head>

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
			<form action="" method="post">
				<table  align="center" style="border:none;">
					<tr>
						<th colspan="2">查找图书</th>
					</tr>
					<tr>
						<td>
							
							<select name="fieldName">
								<option value="bName">书名</option>
								<option value="message">类型</option>
								<option value="writer">作者</option>
							</select>
							
						</td>
						<td><input  type="text"  placeholder="请在此输入" name="fieldValue"/></td>
						<td><input type="button" value="查询" class="button [secondary success alert]"/></td>
					</tr>	
				</table>
			</form>
		<br />
		<div id="resultTbl"></div>
		</div>
	</div>	
		<div id="add" style="float:right;"></div>
	</div>
	
	<script type="text/javascript">
		
		$(document).ready(function() {
			//通过get方法把php文件中的内容引入到html中
			$.get("../PHP/findBook_php.php",function(reStr){
				$("#resultTbl").html(reStr);
				});
				
				$("input[type='button']").click(function(){
				//单击按Ajax钮请求页面
				$.post("../PHP/findBook_php.php?pageB=page",$( "form" ).serialize(),function(reStr){
					$("#resultTbl").html(reStr);
					})
				});
			});
		
		function add(){
			  var d = new Date();
			  document.getElementById('add').innerHTML = d.getFullYear()+"年"+(d.getMonth()+1)+"月"+d.getDate()+"日 "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
			  setTimeout("add()",1000);
		}
		add();
	</script>
</body>
</html>
