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
	$host = "localhost";
	$user = "root";
	$database = "library";
	$pwt = "";
	$conn = mysql_connect("$host","$user","$pwt") or die("连接失败：".mysql_error());
	$select_db = mysql_select_db($database,$conn);
	mysql_query("set names utf8");
	if(!$select_db){
		echo '无数据';
	}
	//判断是否能获取到
	$whereStr = "";
	if(isset($_POST['fieldName']) && isset($_POST['fieldValue'])){
		$fldName = $_POST['fieldName'];
		$fldValue = $_POST['fieldValue'];
		$whereStr = " where ".$fldName." like '%".$fldValue."%'";
	}
	if(isset($_GET['page'])){
		$page=intval($_GET['page']);
	}else{
		$page=1;		
	}
	//每页amount
	$page_size=10;
	//获取总数据量
	$sql = "select count(*) as amount from librarion";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$amount = $row['amount'];
	//计算总共有多少页
	if($amount){
		if($amount<$page_size){
			$page_count=1;
		}
		//有一页
		if($amount%$page_size){
			$page_count=(int)($amount/$page_size)+1;//如果有余数。则页数等于总数据量除每页的结果再加1
		}else{
			$page_count=$amount/$page_size;//没有余数直接显示页数
		}
	}else{
		$page_count=0;//显示0页	
	}
	//翻页连接
	if($page==1){
		$page_string.='第一页｜上一页';
	}else{
		$page_string.='<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>';	
	}
	if($page<$page_count){
		$page_string.='<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
	}else {
		$page_string.='下一页｜尾页';
	}
	//获得数据，以二维数组格式返回结果
	if($amount){
		$sql="select * from librarion ".$whereStr." order by id  limit ".($page-1)*$page_size.",$page_size";
		$result = mysql_query($sql);
		while($row=mysql_fetch_row($result)){
			$rowset[]=$row;
		}
	}else{
		$rowset = array();	
	}
	//循环二维数组生成表格
	$resultTbl = "";
	$resultTbl .=  "<table align='center' border='1'>";
	$resultTbl .= "<tr><th>序号</th><th>用户名</th><th>性别</th><th>年龄</th><th>密码</th><th>地址</th><th>籍贯</th><th>操作</th></tr>";
		foreach ($rowset as $row){
			$resultTbl .= "<tr>";
			$resultTbl .= "<td>".$row['0']."</td>";
			$resultTbl .= "<td>".$row['1']."</td>";
			$resultTbl .= "<td>".$row['2']."</td>";
			$resultTbl .= "<td>".$row['3']."</td>";
			$resultTbl .= "<td>".$row['4']."</td>";
			$resultTbl .= "<td>".$row['5']."</td>";
			$resultTbl .= "<td>".$row['6']."</td>";
			$resultTbl .= "<td><a href='update_user.php'>更新</a>｜<a href='delete_user.php'>删除</a></td>";
			$resultTbl .= "</tr>";
		}
	$resultTbl .= "<tr><td colspan='7'>".$page_string."</td></tr>";
	$resultTbl .= "</table>";
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
			<br />
			<form action="findUser.php" method="post">
				<table align="center" style="border:none;">
					<tr>
						<th colspan="2">查找用户</th>
					</tr>
					<tr>
						<td>
							<select name="fieldName">
								<option value="libName">用户名</option>
								<option value="sex">性别</option>
								<option value="place">籍贯</option>
							</select>
						</td>
						<td><input  type="text" placeholder="请在此输入" name="fieldValue" /></td>
						<td><input  type="submit" value="查询" class="button [secondary success alert]"/></td>
					</tr>	
				</table>
			</form>
	
				<br />
		<?php echo $resultTbl ?>
	</div>
	</div>
		<div id="add" style="float:right;"></div>
	</div>

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