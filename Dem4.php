<!DOCTYPE html>
<html>
	<head> 
	
		<meta http-equiv="Content-Type" content="textml;charset=utf-8">
	<head>
	<body>
		<?php 
			function search($arr,$find){
				foreach($arr as $k => $v){
					if($find == $v){	
						
						return "{$find}在数组中的键名为:$k";
					}
	
				}
				print("\n-----------");
				return '查找不到';
			}
		
			$arr = [55,9,7,62];
			echo search($arr,7);
			echo search($arr,10);
		
		?>
	</body>
</html>