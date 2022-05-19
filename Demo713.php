<!DOCTYPE html>
<html>
	<head> 
	
		<meta http-equiv="Content-Type" content="textml;charset=utf-8">
	<head>
	<body>
		<?php 
		//print_r($_POST['hobby']);
			$_POST['user']['name'];
			$_POST['user']['a'][1];
			$_POST['user'][1]['b'];
			$_POST['user']['c'][0];
			$_POST['user'][2]['d'];
			$_POST['user'][3][0];
			$_POST['user'][3][1][0];
			$_POST['user'][3][2][0];
			$_POST['user'][4][0][2];
			$_POST['user'][4][0][3];
			
			foreach($_POST['hobby']as $v)
			{
				echo '您选择了：'.$v .' ';
				echo "<br />";
				
			}
	echo <<<EOF
	<textarea name="message" rows="10" cols="30">您选择了$v</textarea>			

EOF;

	

		?>
	</body>
</html>