<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>用户登录</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            html,body{
                width: 100%;
                height: 100%;
                
            }
            body{
                background-color: #FCFDF8;
            }
            body .container{
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #login{
                width: 400px;
                
            }
            .panel-footer{
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .alert{
                margin: 0px;
                padding: 2px;
                text-align: center;
                display: none;
            }
            #captcha{
                width: 180px;
                height: 38px;
                float: left;

            }
        </style>
        
    </head>
    <body>
        <div class = 'container'>
			<form name='frm1' method="post">
				<div class = 'panel panel-primary' id = 'login'>
					<div class = 'panel-heading'>
						登陆
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
                        <div class="from-group">
                            <label for="captch" style="float: left;margin-top: 10px;        ">验证码：</label>
                            <input type="text" name="captcha" id="captcha"  class="form-control" placeholder="验证码" />
                            <img src="captch.php" class="pull-right"  style="cursor: pointer" onclick="this.src=this.src+'?d'+Math.random();" title="点击刷新" alt="captcha">
                        </div>

						<div class="alert alert-danger" role="alert">...</div>
					</div>
					<div class = 'panel-footer'>
						<a href="./register.php">马上注册</a>
						<input type="submit" class = 'btn btn-primary' name='loginBtn' id = 'loginBtn' value="登录" />
					</div>
				</div>
			</form>
        </div>
    </body>
</html>
<?php
session_start();
$conn=mysqli_connect("localhost","root","root","qd2002");
mysqli_set_charset($conn,"utf8");
$username=@$_POST['username'];
$password=@$_POST['password'];
$captcha=@$_POST['captcha'];
function test($username,$password,$captcha){
	if(!$username)
		echo "<script>alert('用户名不能为空！');location.href='login.php'</script>";
	elseif(!$password)
		echo "<script>alert('密码不能为空！');location.href='login.php'</script>";
	elseif (!$captcha)
        echo "<script>alert('验证码不能为空！');location.href='login.php'</script>";

}
if(@$_POST['loginBtn']=='登录'){
	test($username,$password,$captcha);
	$sql="select * from users where username='$username' and password='$password';";
	$result=mysqli_query($conn,$sql);
	$row =mysqli_num_rows($result);

	if ( $captcha!=$_SESSION['yzm']){
	    echo "<script>alert('登录错误');location.href='login.php';</script>";

    }else{
        if(  !$row ){
            echo "<script>alert('输入的账号密码有误，请重新输入！');</script>";
        }else{
            echo "<script>alert('登录成功');location.href='index.php';</script>";
        }
    }
}


?>