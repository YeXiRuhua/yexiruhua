<?php
	$mysql = mysql_connect('localhost','root','root','itheima');
	echo $mysql?'�������ݿ�ɹ�':'�������ݿ�ʧ��';
	$result = mysqli_query($mysql,'select * from itheima');
	if(!$result){
		exit('������Ϣ��'.mysql_error($mysql));
	}
?> 