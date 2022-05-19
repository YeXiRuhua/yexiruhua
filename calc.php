
<?php
		
			$action = isset($_GET['action'])? $_GET['action']:'';
			$num1 = isset($_GET['num1']) ? (int)$_GET['num1']:0;
			$num2 = isset($_GET['num2']) ? (int)$_GET['num2']:0;
			$num3 = 0;
			
			
			switch($action){
				case 'add':
						$num3 = $num1+$num2;
						break;
				case 'sub':
						$num3 = $num1-$num2;
						break;
				case 'mul':
						$num3 = $num1*$num2;
						break;
				case 'div':
						$num3 = $num2 ? ($num1/$num2):'除数不能为零';
						break;
				define:
						echo'参数不正确';
			
			}

echo <<<EOF
	<script>
		alert($num3);
	</script>
EOF;
			
				
		
	
			
			
?>	
