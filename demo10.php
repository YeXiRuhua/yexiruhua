<?php
	//header('Content-Type:image/jpeg');
	//echo file_get_contents('./php.jpeg');
	 foreach(file(__file__) as $k=>$v){
		echo htmlspecialchars("Line #$k:$v") ,'<br>';
	 }
	
/*	$filename='./word.txt';
	$content='look at 看';
	file_put_contents($filename,$content);
	echo file_get_contents($filename);
	file_put_contents($filename,$content,FILE_APPEND);
	echo file_get_contents($filename);*/
	
	$content ='Cheshire';
	$content =iconv('UTF-8','GBK',$content);
	file_put_contents('./word.txt',$content);
?>