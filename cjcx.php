<html>
<head>
    <title>成绩查询</title>
    <meta charset="UTF-8">
    <style type="text/css">
        div{
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #008000;
        }
        table{
            width: 300px;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;color: #ffcccc;">成绩表操作</h1>

<form name="frm1" method="get">
    <table align="center">
        <tr>
            <td nowrap bgcolor="#ccc">课程号：</td>
            <td><input name="KCNumber" size="13" type="text"></td>
            <td nowrap bgcolor="#ccc">课程名：</td>
            <td><input name="KCName" size="13" type="text"></td>
            <td nowrap bgcolor="#ccc">成绩：</td>
            <td><input name="CJ" size="13" type="text"></td>
            <td nowrap>
                <input type="submit" name="Query" value="查询">
            </td>
        </tr>
    </table>
</form>
<?php
$conn=  mysqli_connect("localhost","root","root","XSCJ");
mysqli_set_charset($conn,"utf8");//设置字符集
$KCNumber=@$_GET['KCNumber'];//获取课程号
$KCName=@$_GET['KCName'];//获取课程名
$CJ=@$_GET['CJ'];//获取成绩
function getsql($KCNumber,$KCName,$CJ){
    $sql="select *from CJB where ";
    $note=0;
    if($KCNumber){
        $sql.="课程号 like'%$KCNumber%'";
        $note=1;
    }
    if($KCName){
        if($note==1){
            $sql.=" and 课程名 like '%$KCName%'";
            echo "<script>alert('sql=".$spl."')</script>";
        }  else {
            $sql.="课程名 like '%$KCName%'";
        }
        $note=1;
    }
    if($CJ!=0){
        if($note==1){
            $sql.=" and 成绩 like '%$CJ%'";
        }  else {
            $sql.="成绩 like '%$CJ%'";
        }

    }
    if($note==0){
        $sql="select * from cjb";
    }
    return $sql;
}
$sql=getsql ($KCNumber,$KCName,$CJ);
$result=  mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);
if(!$result){
    printf("Error: %s\n",  mysqli_error($conn));
    exit();
}
$page=  isset($_GET['page'])?intval($_GET['page']):1;
$num=3;
$url='cjcx.php';
$pagenum=ceil($total/$num);
$page=min($pagenum,$page);
$prepg=$page-1;
$nextpg=($page==$pagenum?0:$page+1);
$new_sql=$sql." limit ".($page-1)*$num.",".$num;
$new_result=  mysqli_query($conn, $new_sql);
if($new_row=@mysqli_fetch_array($new_result)){
    echo "<br><div alige=center><font>学生成绩查询结果</font></div>";
    echo "<br>";
    echo "<table width=500 border=1 align=center>";
    echo "<tr><td>课程号</td>";
    echo "<td>课程名</td>";
    echo "<td>成绩</td></tr>";
    do{
        list($KCH,$KCM,$CJ)=$new_row;
        echo "<tr><td>$KCH</td>";
        echo "<td>$KCM</td>";
        echo "<td>$CJ</td></tr>";
    }while($new_row=  mysqli_fetch_array($new_result));
    echo "</table>";
    $pagenav="";
    if($prepg){
        $pagenav.="<a href='$url?page=$prepg&KCNumber=$KCNumber&KCName=$KCName&CJ=$CJ'>上一页</a>";
    }
    for($i=1;$i<=$pagenum;$i++){
        if($page==$i){
            $pagenav.=$i." ";
        }  else {
            $pagenav.="<a href='$url?page=$i&KCNumber=$KCNumber&KCName=$KCName&CJ=$CJ'>$i</a>";
        }
    }
    if($nextpg){
        $pagenav.="<a href='$url?page=$nextpg&KCNumber=$KCNumber&KCName=$KCName&CJ=$CJ'>下一页</a>";
    }
    $pagenav.="共(".$pagenum.")页";
    echo "<br><div alige=center>".$pagenav."</div>";
}
?>

