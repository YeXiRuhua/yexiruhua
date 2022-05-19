<?php
	$mysql = mysql_connect('localhost','root','root','itheima');
	echo $mysql?'链接数据库成功':'连接数据库失败';
	$result = mysqli_query($mysql,'select * from itheima');
	if(!$result){
		exit('错误信息：'.mysql_error($mysql));
	}
?> 