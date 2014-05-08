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
		
				$BId=$_GET["bookId"];
				$bStr = "delete from librarion where id='".$BId."'";
			
				$dQuery = mysql_query($bStr);
				/*if($dQuery){
						echo '<script type="text/javascript">';
						echo 'alert("成功")';
						echo '</script>';
					}else{
						echo '<script type="text/javascript">';
						echo 'alert("gg成功")';
						echo '</script>';
						}
				*/
				
				if(mysql_affected_rows($dQuery)==0){
												echo '<script type="text/javascript">';
												echo 'alert("成功");';
												echo 'window.location.href = "findUser.php";';
												echo '</script>';	
				}else{
						echo '<script type="text/javascript">';
						echo 'alert("失败");';
						echo 'window.location.href = "findUser.php";';
						echo '</script>';
					}
				
				mysql_free_result($dQuery);	
				mysql_close($dQuery);
				


?>