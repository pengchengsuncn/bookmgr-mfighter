<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/backstage.css" />
<link rel="stylesheet" type="text/css" href="../style/foundation.min.css" />样式	
<title>无标题文档</title>
</head>

<body> 
<div id="container" class="admin">
		<?php include ("menu.php"); ?>
		<div id="formTab">
			<form action="submitBook.php" method="post">
				<table align="center" width="500" style="border:none;" class="addbook-tbl">
				<caption><h3>添加图书</h3></caption>
					<tr>
						<th >书名：</th>
						<td><input type="text" name="bName" /></td>
					</tr>
					<tr>
						<th>类型：</th>
						<td><input type="text" name="message" /></td>
					</tr>
					<tr>
						<th>销售时间：</th>
						<td><input type="date" name="buyDate" /></td>
					</tr>
					<tr>
						<th>作者：</th>
						<td><input type="text" name="writer" /></td>
					</tr>
					<tr>
						<th>价格：</th>
						<td><input type="text" name="price" /></td>
					</tr>
					<tr>
						<th>种类：</th>
						<td><input type="text" name="bookType" /></td>
					</tr>
					<tr>
						<th colspan="2"><input class="medium secondary button" type="submit" value="添加" /></th>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
	<div id="add" style="float:right;"></div>
	
</div>


<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>js的框架//引用
<script type="text/javascript" src="../js/jquery.validate-1.9.0.min.js"></script>//验证
<script src="../js/foundation.min.js"></script>css框架
<script type="text/javascript">

	//jQuery 开始
	$( document ).ready(function() {
		
		//foundation 框架用地
		$(document).foundation();//form框架
		
		//显示当前时间
		add();
		
		//表单验证
		$("form").validate({
			rules: {
				bName: "required",
				message:{
					required:true,
					maxlength:5    
				},
				buyDate: {
					dateISO:true ,	
				},
				writer:{
					required:true,
				},
				price: {
					number:true,
				},
				bookType: {
					digits:true, 	
				}
			},
			messages: {
				bName: "请输入图书名称！",
				message: "请输入类型名称最大长度5",
				writer: "5——10个字符",
				buyDate: "请输入正确日期格式",
				price: "请正确输入",
				bookType: "请为整"
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