<!DOCTYPE html>
<html>
	<head>
		<meta content ="textml;charset = utf-8" />
	</head>
	<body>
		<?php
				$day = 9;$a1=$a2=1;
				while($day>0)
				{
					$a1 = ($a2+1)*2;
					$a2=$a1;
					$day--;
				}
				
			echo $a1;
			$a = strrpos('Welcome to learning PHP','e');
			echo $a;
			
		
		
		?>
	</body>
</html>