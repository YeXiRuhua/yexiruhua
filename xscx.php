<html>
    <head>

        <title>学生信息查询</title>
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
    <h1 style="text-align: center;color: #ffcccc;">学生表操作</h1>            
                
                <form name="frm1" method="get">
                    <table align="center">
                        <tr>
                            <td nowrap bgcolor="#ccc">学号：</td>
                            <td><input name="StuNumber" size="13" type="text"></td>
                            <td nowrap bgcolor="#ccc">姓名：</td>
                            <td><input name="StuName" size="13" type="text"></td>
                            <td nowrap bgcolor="#ccc">性别：</td>
                            <td><input name="XB" size="13" type="text"></td>
                            <td>
                                <input type="submit" name="Query" value="查询">
                            </td>
                        </tr>
                    </table>
                </form>
</html>
<?php
$conn=  mysqli_connect("localhost","root","root","xscj");
mysqli_set_charset($conn,"utf8");//设置字符集
$StuNumber=@$_GET['StuNumber'];//获取课程号
$StuName=@$_GET['StuName'];//获取课程名
$XB=@$_GET['XB'];

function getsql($StuNum,$StuNa,$XB){
    $sql="select * from xsb where ";
    $note=0;
    if($StuNum){
        $sql.="学号 like '%$StuNum%'";
        $note=1;
    }
    if($StuNa){
        if($note==1){
            $sql.=" and 姓名 like '%$StuNa%'";
        }  else {
              $sql.="姓名 like '%$StuNa%'";    
        }
        $note=1;
    }
    if($XB){
        if($note==1) {
            $sql.=" and 性别 like '%$XB%'";
        }  else {
              $sql.="性别 like '%$XB%'";  
        }
        $note=1;
    }
    
    if($note==0){
        $sql="select * from xsb";
    }
    return $sql;
}
$sql=getsql ($StuNumber,$StuName,$XB);
$result=  mysqli_query($conn,$sql);
if(!$result){
    printf("Error: %s\n",  mysqli_error($conn));
    exit();
}
$total=  mysqli_num_rows($result);
$page=  isset($_GET['page'])?intval($_GET['page']):1;
$num=3;
$url='xscx.php';
$pagenum=ceil($total/$num);
$page=min($pagenum,$page);
$prepg=$page-1;
$nextpg=($page==$pagenum?0:$page+1);
$new_sql=$sql." limit ".($page-1)*$num.",".$num;
$new_result=  mysqli_query($conn, $new_sql);
if($new_row=@mysqli_fetch_array($new_result)){
    echo "<div>";
    echo "<br><div alige=center><font>学生信息查询结果</font></div>";
    echo "<br>";
    echo "<table width=500 border=1 align=center>";
    echo "<tr><td>学号</td>";
    echo "</div>";
    echo "<div>";
    echo "<td>姓名</td>";
    echo "<td>性别</td>";
    echo "</tr>";
    echo "</div>";
    do{
        list($XH,$XM,$XB)=$new_row;
        echo "<tr>";
        echo "<td>$XH</td>";
        echo "<td>$XM</td>";
        echo "<td>$XB</td>";
        echo "</tr>";
    }while($new_row=  mysqli_fetch_array($new_result));
    echo "</table>";
    $pagenav="";
    if($prepg){
        $pagenav.="<a href='$url?page=$prepg&$StuName&$StuNumber&$XB'>上一页</a>";
    }
    for($i=1;$i<=$pagenum;$i++){
        if($page==$i){
            $pagenav.=$i." ";
        }  else {
        $pagenav.="<a href='$url?page=$i'>$i</a>";    
        }
    }
    if($nextpg){
        $pagenav.="<a href='$url?page=$nextpg'>下一页</a>"; 
    }
    $pagenav.="共(".$pagenum.")页";
    echo "<br><div alige=center>".$pagenav."</div>";
        }
?>

