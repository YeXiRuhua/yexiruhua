<!DOCTYPE html>
<html>
	<head> 
		<meta http-equiv="Content-Type" content="textml;charset=utf-8">
	</head>
	<body>
		<?php
			function king($n,$m){
				$monkey =range(1,$n);
				$i=0;
				while(count($monkey)>1){
					++$i;
					$head = array_shift($monkey);
					if($i % $m!=0){
						array_push($monkey,$head);
					}
				}
				return ['total'=>$n,'kick'=>$m,'king'=>$monkey[0]];
			}
			$data = king(10,7);
		?>
		<table>
			<tr><th colspan = "2">找King游戏</th></tr>
			<tr><td>猴子总数:</td><td><?=$data['total']?></td></tr>
			<tr><td>提出第m个猴子:</td><td><?=$data['kick']?></td></tr>
			<tr><td>猴King编号:</td><td><?=$data['king']?></td></tr>
			
		</table>
	</body>
</html>