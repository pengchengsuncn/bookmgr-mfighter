<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/backstage.css"/>
<link rel="stylesheet" type="text/css" href="../style/foundation.min.css" />

<title>无标题文档</title>
</head>

<body>
<div id="container" class="admin">
	<?php include ("menu.php"); ?>
		<div id="formTab">
			<form action="submitUser.php"method="post">
				<table class="addtable" width="500" style="border:none;" align="center">
	 			<caption><h3>添加用户</h3></caption>
					<tr>
						<th><label for="userName">用户名：</label></th>
						<td><input type="text" name="userName" /></td>
					</tr>
					<tr>
							<th>性别：</th>
							<td>
								<select name="sex">
									<option value="男">男</option>
									<option value="女" selected="selected">女</option>
									<option value="secret">secret</option>
								</select>
							</td>
					</tr>
					<tr>
						<th><label for="age">年龄：</label></th>
						<td><input type="text" name="age"/></td>
					</tr>
					<tr>
						<th>地址：</th>
						<td><input type="text" name="address"/></td>
					</tr>
					<tr>
						<th>籍贯：</th>
						<td><input type="text" name="place"/></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" class="medium secondary button"  value="添加" /></th>
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
		
		add();
			$(document).foundation();
		
		$("form").validate({
			rules: {
				userName: "required",
				sex: {
					required:true	
				},
				age: {
					required:true,
					number:true
				},
				address: { 
					required:true,
					maxlength:20	
				},
				place: {
					required:true	
				}
			},
			messages: {
				userName: "请输入图书名称！",
				sex: "请选择其中一个",
				age: "请输入数字",
				address: "最大长度不能超过20",
				place: "请正确输入"
			},
			submitHandler:function(form){
				form.submit();
			}
		});
		
		
	});

	
	function add(){
		  var d = new Date();
		  document.getElementById('add').innerHTML = d.getFullYear()+"年"+(d.getMonth()+1)+"月"+d.getDate()+"日 "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
		  setTimeout("clock()",1000);
	}
</script>
</body>
</html>