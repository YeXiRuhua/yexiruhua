<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml;charset=utf-8"> 
		<body>
			<?php
			
				$year = 2004;
				if($year%100){
					echo $year . '是世纪年';
				}else{
					echo $year .'不是世纪年';
				}
				
				
			
			?>
		</body>
	</head>
</html>