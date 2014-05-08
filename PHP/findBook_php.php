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
	
	$whereStr = "";
	//首先判断有没有FORM提交
	if(isset($_POST['fieldName']) && isset($_POST['fieldValue'])){
		$fldName = $_POST['fieldName'];
		$fldValue = $_POST['fieldValue'];
		$whereStr = " where ".$fldName." like '%".$fldValue."%'";
	}
	
	//验证a连接中是否存在$page变量
	if(isset($_GET['page'])){
		$page=intval($_GET['page']);
	}else{
		$page=1;		
	}
	//每页amount
	$page_size=10;
	
	//获取总数据量
	$sql = "select count(*) as amount from tbooks";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);//查询出amount这行记录
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
	
	//翻页连接当页数等于1时
	if($page==1){ 
		$page_string.='第一页｜上一页';//等价于
	}else{
		$page_string.='<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>';	
	}
	//当页码小于总页面数
	if($page<$page_count){
		$page_string.='<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
	}else {
		$page_string.='下一页｜尾页';
		
	}
	//获得数据，以二维数组格式返回结果
	if($amount){
		$sql = "select * from tbooks ".$whereStr." order by id  limit ".($page-1)*$page_size.",$page_size";
		$result = mysql_query($sql);
		while($row=mysql_fetch_row($result)){
			$rowset[]=$row;//查到的值放到数组
		}
	}else{
			$rowset = array();	//空数组
	}
	//循环二维数组生成表格
	$resultTbl = "";
	$resultTbl .= "<table class='book-list-tbl' align='center' border='1' >";
	$resultTbl .= "<tr><th>序号</th><th>书名</th><th>类型</th><th>销售日期</th><th>作者</th><th>价格</th><th>种类</th><th>操作</th></tr>";
	foreach ($rowset as $row){
		$resultTbl .= "<tr>";
			$resultTbl .= "<td>".$row['0']."</td>";
			$resultTbl .= "<td>".$row['1']."</td>";
			$resultTbl .= "<td>".$row['2']."</td>";
			$resultTbl .= "<td>".$row['3']."</td>";
			$resultTbl .= "<td>".$row['4']."</td>";
			$resultTbl .= "<td>".$row['5']."</td>";
			$resultTbl .= "<td>".$row['6']."</td>";
			$resultTbl .= "<td><a href='update_book.php'>更新</a>|<a href='delete_book.php'>删除</a></td>";
		$resultTbl .= "</tr>";
	}
	$resultTbl .= "<tr><td colspan='8'>".$page_string."</td></tr>";
	$resultTbl .= "</table>";
	
	echo $resultTbl;

?>