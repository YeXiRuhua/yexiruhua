<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml;charset=utf-8">
	</head>
	<body>
		<?php 
		    date_default_timezone_set("PRC");
			function format_data($time)
			
			{
				$diff = max ($time -time(),0);
			    $format = [86400 => '天',3600 =>'小时',60 => '分钟', 1=>'秒'];
			    foreach($format as $k =>$v){
					$result =floor($diff/$k);
					if($result){
							return $result .$v;
					}
				}
				return '0秒';
			}
			
			$time =  strtotime(((int)date('Y')+1).'-1-1');
			echo '距离元旦还有:',format_data($time);
			
			$month = 7;
			$day = 16;
			//距离生日多少天
			if($month<=(int)date('m') && $day<(int)date('d')){
					$time = strtotime((date('Y')+1)."-$month-$day");
					echo'距离明年生日多少天:',format_data($time);
			}else{
			
					$time = strtotime(date('Y')."-$month-$day");
					echo '距离今年生日多少天：',format_data($time);
			}
			
		?>
		
	</body>
</html>
