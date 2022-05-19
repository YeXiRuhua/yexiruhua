<!DOCTYPE html>
<html>
	<head>
		<meta content = "textml;charset=UTF-8">
	</head>
	<body>
		<?php
			$arr= array(1,2,array('h'));
			//echo count($arr,1);
			//echo array_product(array(2,9,true,5));
			$s = 'Hello';
			//echo $s[1];
			strpos('')
			
			$arr[10]=[];
			function fn($num){
				for($i=0;$i<$num;$i++){
					if($i==0||$i==1){
						$arr[$i]=1;
					}else{
						$arr[$i]=$arr[$i-1]+$arr[$i-2];
					}
				}
				return $arr;
			}
			//print_r(fn(10));
			foreach(fn(10) as $v)
			{
					echo $v.' ';
			}
		
		?>
	</body>
</html>