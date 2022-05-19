<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml;charset=utf-8"> 
	</head>
	<body>
		<?php 
		    
			function generate_table($row,$col){
				$html ='<table>';
				for($i = 1;$i<=$row ;++$i){
					$html .= '<tr>';
					for($j=1;$j<=$col;++$j){
						$html .='<td>11</td>';
					}
					$html .= '</tr>';
				}
				return $html . '</table>';
			}
			echo generate_table(5,8);
		
		
		?>
	</body>
	
</html>