<?php
//error_reporting(0);

date_default_timezone_set('Asia/Shanghai');

$AddTime=date('Y-m-d H:i:s',time());
$MCC="";
$MNC="";
$LAC="";
$CID="";
$IP="";
$totalStr=@file_get_contents('php://input');

if(isset($_REQUEST["MCC"])) $MCC=$_REQUEST["MCC"];
if(isset($_REQUEST["MNC"])) $MNC=$_REQUEST["MNC"];
if(isset($_REQUEST["LAC"])) $LAC=$_REQUEST["LAC"];
if(isset($_REQUEST["CID"])) $CID=$_REQUEST["CID"];
if(isset($_REQUEST["IP"])) $IP=$_REQUEST["IP"];


		  
echo '{
	     "AddTime":"'.$AddTime.'",
		 "MCC":"'.$MCC.'",  
		 "MNC":"'.$MNC.'",
		 "LAC":"'.$LAC.'",  
		 "CID":"'.$CID.'",  
		 "IP":"'.$IP.'",  
		 "totalStr":"'.$totalStr.'"
	}';

error_reporting(E_ALL ^ E_DEPRECATED);
$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
$mysql_username='root'; //改成自己的mysql数据库用户名
$mysql_password='123456'; //改成自己的mysql数据库密码
$mysql_database='bigEvent'; //改成自己的mysql数据库名

$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);//连接数据库
mysql_select_db($mysql_database); 

mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
   
   
$sql = "INSERT INTO `phoneinfo`(`AddTime`, `totalStr`, `MCC`, `MNC`, `LAC`, `CID`, `IP`) 
        VALUES 
	   ('".$AddTime."','".$totalStr."','".$MCC."','".$MNC."','".$LAC."','".$CID."','".$IP."')";
echo $sql;
$result = mysql_query($sql,$conn); //查询
  
mysql_close(); //关闭MySQL连接

?>