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