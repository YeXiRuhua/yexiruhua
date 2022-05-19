<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>用户注册</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            html,body{
                width: 100%;
                height: 100%;
                
            }
            body{
               background-color: #FCFDF8;
				justify-content: center;
            }
            body .container{
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #register{
                width: 400px;
                
            }
            .panel-footer{
                display: flex;
                /* 垂直方向 */
                align-items: center;
                /* 水平方向 */
                justify-content: space-between;
            }
            .alert{
                margin: 0px;
                padding: 2px;
                text-align: center;
                display: none;
            }
        </style>
        
    </head>
    <body>
		
        <div class = 'container'>
			<form name="frm1" method="get">
				<div class = 'panel panel-primary' id = 'register'>
					<div class = 'panel-heading'>
						注册
					</div>
					<div class = 'panel-body'>
						<div class = 'form-group'>
							<label for="username">用户名：</label>
							<input type="text" name = 'username' class = 'form-control' placeholder="用户名" />
						</div>
						<div class = 'form-group'>
							<label for="password">密码：</label>
							<input type="password" name = 'password' class = 'form-control' placeholder="密码" />
						</div>
						<div class = 'form-group'>
							<label for="repassword">确认密码：</label>
							<input type="text" name = 'repassword' class = 'form-control' placeholder="确认密码" />

                        </div>
						<div class="alert alert-danger" role="alert">...</div>
					</div>
					<div class = 'panel-footer'>
						<a href="./login.php">马上登陆</a>
						<input type="submit" class = 'btn btn-primary' name="registerBtn" id = 'registerBtn' value="注册" />
					</div>
				</div>
			</form>
        </div>
		
      
    </body>
</html>





<?php
$conn=mysqli_connect("localhost","root","root","qd2002");
mysqli_set_charset($conn,"utf8");
$username=$_GET['username'];
$password=$_GET['password'];
$repassword=$_GET['repassword'];

/*$sql="select * from users where username='$username'";
$result=mysqli_query($conn,$sql);
$row=@mysqli_fetch_array($result);
if (($username!=NULL)&&(!$row)){
    echo "<script>alert('该用户没有注册')</script>";
}else{
	echo "<script>alert('该用户已经注册')</script>";
}
*/

function test($username,$password,$repassword){
	if(!$username)
		echo "<script>alert('姓名不能为空！');location.href='register.html';</script>";
	elseif(!$password)
		echo "<script>alert('密码不能为空！');location.href='register.html';</script>";
	elseif(!$repassword)	
		echo "<script>alert('确认密码不能为空！');location.href='register.html';</script>";
}
if(@$_GET['registerBtn']=='注册'){
	test($username,$password,$repassword);
	$s_sql="select username from users where username='$username'";
	$s_result=mysqli_query($conn,$s_sql);
	$s_row=@mysqli_fetch_array($s_result);
	if($s_row){
		echo "<script>alert('该用户已经注册')</script>";
	}else{
		$insert_sql="insert into users (username,password,repassword)values('$username','$password','$repassword');";
		$insert_result=mysqli_query($conn,$insert_sql) or die ('注册失败');
		if(mysqli_affected_rows($conn)!=0){
			echo "<script>alert('注册成功，请登录！');location.href='login.php';</script>";
		}

	}
	
}


?>
