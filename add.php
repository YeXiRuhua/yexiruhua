<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv = "Content-Type" content="textml;charset = utf-8">
	</head>
	<body>
		<?php 
			function extra(&$str){
				$str .='and banana are frond of foods';
			}
			$str ='egg ';
			extra($str);
			echo $str;
		
		
		?>
	</body>
	
	
</html>