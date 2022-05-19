<!doctype html>
<html>
	<meta http-equiv="Content-Type" content="textml;charset=utf-8"> 
	<body>
	<?php	$i = $sum =0;
			
			
			for($i=0;$i<5;$i++)
			{	$sum +=$i;
				if($i==3) break;
			}
			echo $sum;
	?>
	</body>
</html>