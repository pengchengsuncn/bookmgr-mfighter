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
				
				$b_v = $_POST["book"];
				$T_value = $_POST["tName"];
				$S_value =$_POST["sName"];
				$w_valu = $_POST["wName"];
				$P_value = $_POST["pName"];
				$N_value = $_POST["nName"];
				$i_value = $_POST["HID"];
				
				
				$update_Sql = "update tbooks set bName='".$b_v."',message='".$T_value."',soldDate='".$S_value."',writer='".$w_valu."',price='".$P_value."',bookType='".$N_value."' where id= '".$i_value."';";
				
				$update_end = mysql_query($update_Sql);
				
				mysql_free_result($update_end);
				mysql_close($update_end);
				
				
				
				
				
				
				

?>