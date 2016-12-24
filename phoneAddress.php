
<!DOCTYPE html> 
<html> 
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <link href="/bootstrap.min.css" rel="stylesheet" />

<style>
	
</style>
</head>
<body> 
<h1>Phone Address</h1> 



<?php
error_reporting(0);
$a=@file_get_contents('php://input');

date_default_timezone_set('Asia/Shanghai');
echo date('Y-m-d H:i:s',time());


error_reporting(E_ALL ^ E_DEPRECATED);
$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
$mysql_username='root'; //改成自己的mysql数据库用户名
$mysql_password='123456'; //改成自己的mysql数据库密码
$mysql_database='bigEvent'; //改成自己的mysql数据库名

$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);//连接数据库
mysql_select_db($mysql_database); 

mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
 
mysql_select_db($mysql_database); //打开数据库
 
$sql ="select * from phoneinfo order by id desc"; //SQL语句
 
$result = mysql_query($sql,$conn); //查询


echo "<table class='table'><thead><tr><th>ID</th><th>AddTime</th><th>MCC(国家)</th><th>MNC</th><th>LAC</th><th>CID</th><th>IP</th><th>totalStr</th></tr></thead><tbody>";
while($row = mysql_fetch_array($result))
{
	$MNC=$row["MNC"];
	if(empty($MNC))
	{
	;//	$MNC="";
	}
echo "<tr>
          <td>".$row["ID"]."</td>
		  <td>".$row["AddTime"]."</td>
		  <td>".$row["MCC"]."</td>
		  <td>".$row["MNC"]."</td>
		  <td>".$row["LAC"]."</td>
		  <td>".$row["CID"]."</td>
		  <td>".$row["IP"]."</td>
		  <td>".$row["totalStr"]."</td>
      </tr>";
}
echo "</tbody></table>";


function fixValue($val)
{
	if($val==null)
		return '';
	
	return $val;
}
?>

</body> 
</html>