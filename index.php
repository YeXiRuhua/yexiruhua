<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>
		学生成绩管理系统 
		</title>
        <style>
            html,body{
                width: 100%;
                height: 500px;
                text-align: center;

            }
            body{
                background-color: #FCFDF8;
            }
            body .container{
                width: 100%;
                height: 100%;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .panel-footer{

                display: flex;
                /* 垂直方向 */
                align-items: center;
                /* 水平方向 */
                justify-content: space-between;
            }

            .nav li{

                text-align: center;
                float: left;
                list-style: none;
                margin-left: 35px;
                font-size: 20px;
                color:#99FF99;

                line-height: 90px;
            }
            a{

            }
            .nav{
                height:100px ;
                padding-left:225px;
                float: left;
            }
            .nav a:hover{
                background-color: #3F3F3F;
            }


        </style>
		
	</head>
	<body>

           <div class="panel-footer">
               <ul class="nav">
                   <li><a href="kccx.php" target="test">课程表查询</a></li>
                   <li><a href="kcb.php" target="test">课程表插入</a></li>
                   <li><a href="xscx.php" target="test">学生表查询</a></li>
                   <li><a href="xsb.php" target="test">学生表录入</a></li>
                   <li><a href="cjcx.php" target="test">成绩表查询</a></li>
                   <li><a href="cjb.php" target="test">成绩表录入</a></li>
               </ul>

           </div>
			<tr>
				<td align="center" valign ="middle">
					<iframe src="" margin-top="60px" float="left" height="500px" width="100%" class="container" name="test" id="test" scrolling ="yes" frameborder ="0"/>
				</td>
			</tr>

	</body>
</html>