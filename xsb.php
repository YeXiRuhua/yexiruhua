<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
	<title>学生信息更新</title>
        <style type="text/css">
         table{margin:0 auto;}
         td{text-align:center;}
      </style>
  </head>
<body>
<h1 style="text-align: center;color: #ffcccc;">学生表录入</h1>  
<form name="frm1" method="post" >
    <table align="center" >
        <tr>
            <td width="100"><span>根据学号查询:</span></td>
            <td>
                <input name="StuNumber" id="StuNumber" type="text">
                <input type="submit" name="test" value="查找">
            </td>
        </tr>
    </table>
</form>
<br>

<?php
$conn = mysqli_connect("localhost", "root", "root", "XSCJ");
mysqli_set_charset($conn, "set names 'utf8'");
session_start();
$number = @$_POST['StuNumber'];
$_SESSION['number']=$number;
$sql = "select * from xsb where 学号='$number'";
$result = mysqli_query($conn, $sql);
$row = @mysqli_fetch_array($result);
$row['照片'];
$image=$row['照片'];
$_SESSION['image']=$image;
?>

<form name="frm2" method="post" enctype="multipart/form-data">
    <table border="1" align="center">
        <tr>
            <td><span>学号：</span></td>
            <td>
                <input name="StuNum" type="text" value="<?php echo $row['学号']; ?>">
                <input name="h_StuNum" type="hidden" value="<?php echo $row['学号']; ?>">
            </td>
        </tr>
        <tr>
            <td><span>姓名：</span></td>
            <td><input name="StuName" type="text" value="<?php echo $row['姓名']; ?>"></td>
        </tr>
         <tr>
            <td><span>性别：</span></td>
            <td><input name="XB" type="text" value="<?php echo $row['性别']; ?>"></td>
        </tr>
        <tr>
            <td><span>学生照片：</span></td>
            <td align="center">
                <?php
                if($row['照片']){
                    echo "<img src= 'showpicture.php?time=".time()."'width=\"120\" height=\"150\" >";
                }else{
                    echo "<div>暂无照片</div>";
                }
                ?>
                <br><input type="file" name="file">
            </td>
        </tr>
        
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
$num = @$_POST['StuNum'];
$XH=@$_POST['h_StuNum'];
$name = @$_POST['StuName'];
$XB = @$_POST['Sex'];
$tmp_file=@$_FILES["file"]["tmp_name"];
$handle=@fopen($tmp_file,'r');
$picture=@addslashes(fread($handle, filesize($tmp_file)));



if (@$_POST["b"] == '修改') 
{
    if ($num!=$XH){
        echo "<script>alert('学号与原数据有异，无法修改!');location.href='xsb.php'</script>";
    }
    else {
       if(!$tmp_file){
           $update_sql="update xsb set 姓名='$name' where 学号='$XH'";
       }
 else {
        $update_sql="update xsb set 姓名='$name',照片='$picture' where 学号='$XH'";    
       }
       $update_result=  mysqli_query($conn,$update_sql);
       if (mysqli_affected_rows($conn) != 0){
            echo "<script>alert('修改成功!');location.href='xsb.php'</script>";
            
        }  else {
            echo "<script>alert('修改失败!');location.href='xsb.php'</script>";
        }
    }
}

if (@$_POST["b"] == '添加') {

    $se_sql = "select 学号 from xsb where 学号='$num'";
    $se_result = mysqli_query($conn, $se_sql);
    $se_row = @mysqli_fetch_array($se_result);
    if ($se_row){
        echo "<script>alert('学号已存在，无法添加!')</script>";
        }
    else {
        if(!$tmp_file){
        $insert_sql = "insert into xsb(学号,姓名,照片) values ('$num','$name',NULL)";
        }
 else {
     $insert_sql = "insert into xsb(学号,姓名,照片) values ('$num','$name','$picture')";
 }
        $insert_result = mysqli_query($conn, $insert_sql);
        if (mysqli_affected_rows($conn) != 0){
            echo "<script>alert('添加成功!');location.href='xsb.php'</script>";
            
        }  else {
            echo "<script>alert('添加失败!');location.href='xsb.php'</script>";
        }
    }
}

if (@$_POST["b"] == '删除') {
    if ($num==null) {
        echo "<script>alert('请输入要删除的学号!')</script>";
    } else {
        $de_sql = "select 学号 from xsb where 学号='$num'";
        $de_result = mysqli_query($conn, $de_sql);
        $de_row = mysqli_fetch_array($de_result);
        if (!$de_row)
            echo "<script>alert('学号不存在，无法删除!')</script>";
        else {
            $del_sql = "delete from xsb where 学号='$num'";
            $del_result = mysqli_query($conn, $del_sql);
            if (mysqli_affected_rows($conn) != 0)
                echo "<script>alert('删除学号为" . $num . "的学生成功！')</script>";
        }
    }
}
?>

