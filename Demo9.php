<!DOCTYPE html>
<html>
	<head> 
	
		<meta http-equiv="Content-Type" content="textml;charset=utf-8">
	<head>
	<body>
		<?php
			$link = mysqli_connect('localhost','root','root','itheima');
			mysqli_set_charset($link,'utf8');
			$result=mysqli_query($link,'select * from student');
			echo '<table boder><tr><th>id</th><th>name</th><th>gender</th></tr>';
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr><td>' . $row['id'] . '</td>';
					echo '<td>' . $row['name'] . '</td>';
					echo '<td>' . $row['gender'] . '</td></tr>';
				}
			echo '</table>'

			
		?>	
	</body>
</html>