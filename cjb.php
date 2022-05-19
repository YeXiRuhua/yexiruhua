<html>
    <head>
        <title>成绩表信息更新</title>
        <meta charset="UTF-8">
        <style type="text/css">
        table{margin:0 auto;}
        td{text-align:center;}
      </style>
  </head>
<body>
<h1 style="text-align: center;color: #ffcccc;">成绩表录入</h1>
                <form name="frm1" method="post">
                    <table align="center">
                        <tr>
                            <td width="120"><span>根据课程号查询:</span></td>
                            <td>
                                <input name="KCNumber" id="KCNumber" type="text">
                                <input type="submit" name="test" value="查找">
                            </td>
                        </tr>
                    </table>
                </form>

<?php
$conn=  mysqli_connect("localhost","root","root","XSCJ");
mysqli_set_charset($conn,"utf8");
$KCNumber=@$_POST['KCNumber'];
$sql="select * from cjb where 课程号='$KCNumber'";
$result=  mysqli_query($conn,$sql);
$row=@mysqli_fetch_array($result);
//print_r($row);//取得查询结果
if (($KCNumber!=NULL)&&(!$row))
    echo "<script>alert('没有该课程信息！')</script>";
?>
<form name="frm2" method="post" enctype="multipart/form-data">
    <table border="1" align="center">
        <tr>
            <td><span>课程号:</span></td>
            <td>
                <input name="KCNum" type="text" value="<?php echo $row['课程号'];?>">
                <input name="h_KCNum" type="hidden" value="<?php echo $row['课程号'];?>">
            </td>
        </tr>
        <tr>
           <td><span>课程名:</span></td>
           <td><input name="KCName" type="text" value="<?php echo $row['课程名'];?>"></td>
        </tr>
        <tr>
           <td><span>成绩:</span></td>
           <td><input name="CJ" type="text" value="<?php echo $row['成绩'];?>"></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input name="b" type="submit" value="修改">&nbsp;
                <input name="b" type="submit" value="添加">&nbsp;
                <input name="b" type="submit" value="删除">&nbsp;
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
$KCH=@$_POST['KCNum'];
$h_KCH=@$_POST['h_KCNum'];
$KCM=@$_POST['KCName'];
$CJ=@$_POST['CJ'];

function test($KCH,$KCM,$CJ)
{
    if (!$KCH)
        echo "<script>alert('课程号不能为空！');location.href='cjb.php';</script>";
    elseif (!$KCM) 
        echo "<script>alert('课程名不能为空！');location.href='cjb.php';</script>";
    elseif (!is_numeric($CJ)) 
        echo "<script>alert('学分必须为数字！');location.href='cjb.php';</script>";    

}
//单击【修改】按钮
if (@$_POST["b"]=='修改')
{
    test($KCH,$KCM,$CJ);
    if($KCH!=$h_KCH)
        echo "<script>alert('课程号与原数据有异，无法修改！');</script>";
    else {
        $update_sql="update CJB set 课程名='$KCM',成绩='$CJ' where 课程号='$KCH'";
        $update_result=  mysqli_query($conn,$update_sql);
        if (mysqli_affected_rows($conn)!=0)
            echo "<script>alert('修改成功！');</script>";
        else
            echo "<script>alert('信息未修改！');</script>";
    }
}
//单击【添加】按钮
if (@$_POST["b"]=='添加')
{
    test($KCH, $KCM, $CJ);
            $s_sql="select 课程号 from cjb where 课程号='$KCH'";
            $s_result=  mysqli_query($conn, $s_sql);
            $s_row=@mysqli_fetch_array($s_result);
            if ($s_row)
                echo "<script>alert('课程已存在，无法添加！');</script>";
            else {
                   $insert_sql="insert into cjb (课程号,课程名,成绩) values('$KCH','$KCM',$CJ)";
                   $insert_result=  mysqli_query($conn,$insert_sql)or die('添加失败!');
                   if(mysqli_affected_rows($conn)!=0)
                       echo "<script>alert('添加成功!');</script>";
            }
}
//单击【删除】按钮
if (@$_POST["b"]=='删除')
{
    if(!$KCH)
    {
    echo "<script>alert('请输入要删除的课程号！');</script>";
}
 else {
        $d_sql="select 课程号 from cjb where 课程号='$KCH'";
        $d_result=  mysqli_query($conn,$d_sql);
        $d_row=  mysqli_fetch_array($d_result);
        if (!$d_row)
            echo "<script>alert('课程号不存在，无法删除！');</script>";
        else {
                $del_sql="delete from cjb where 课程号='$KCH'";
                $del_result=  mysqli_query($conn,$del_sql)or die('删除失败!');
                if (mysqli_affected_rows($conn)!=0)
                    echo "<script>alert('删除课程".$KCH."成功!');</script>";
        }
}
}
?>

