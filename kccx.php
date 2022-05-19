<html>
    <head>
        <title>课程信息查询</title>
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
                <h1 style="text-align: center;color: #ffcccc;">课程表操作</h1> 
                
                <form name="frm1" method="get">
                    <table align="center">
                        <tr>
                            <td nowrap bgcolor="#ccc">课程号：</td>
                            <td><input name="KCNumber" size="13" type="text"></td>
                            <td nowrap bgcolor="#ccc">课程名：</td>
                            <td><input name="KCName" size="13" type="text"></td>
                            <td nowrap bgcolor="#ccc">学分：</td>
                            <td><input name="XF" size="13" type="text"></td>
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
$XF=@$_GET['XF'];//获取学分
function getsql($KCNumber,$KCName,$XF){
    $sql="select *from kcb where ";
    $note=0;
    if($KCNumber){
        $sql.="课程号 like'%$KCNumber%'";
        $note=1;
    }
    if($KCName){
        if($note==1){
            $sql.=" and 课程名 like '%$KCName%'";
        }  else {
              $sql.="课程名 like '%$KCName%'";    
        }
        $note=1;
    }
    if($XF){
        if($note==1){
            $sql.=" and 学分 like '%$XF%'";
        }  else {
             $sql.="学分 like '%$XF%'";
        }
        $note=1;
    }
    if($note==0){
        $sql="select * from kcb";
    }
    return $sql;
}
$sql=getsql ($KCNumber,$KCName,$XF);
$result=  mysqli_query($conn,$sql);
$total=  mysqli_num_rows($result);
$page=  isset($_GET['page'])?intval($_GET['page']):1;
$num=3;
$url='kccx.php';
$pagenum=ceil($total/$num);
$page=min($pagenum,$page);
$prepg=$page-1;
$nextpg=($page==$pagenum?0:$page+1);
$new_sql=$sql." limit ".($page-1)*$num.",".$num;
$new_result=  mysqli_query($conn, $new_sql);
if($new_row=@mysqli_fetch_array($new_result)){
    echo "<br><div alige=center><font>课程表查询结果</font></div>";
    echo "<br>";
    echo "<table width=500 border=1 align=center>";
    echo "<tr><td>课程号</td>";
    echo "<td>课程名</td>";
    echo "<td>开课学期</td>";
    echo "<td>学时</td>";
    echo "<td>学分</td></tr>";
    do{
        list($KCH,$KCM,$KKXQ,$XS,$XF)=$new_row;
        echo "<tr><td>$KCH</td>";
        echo "<td>$KCM</td>";
        echo "<td>$KKXQ</td>";
        echo "<td>$XS</td>";
        echo "<td>$XF</td></tr>";
    }while($new_row=  mysqli_fetch_array($new_result));
    echo "</table>";
    $pagenav="";
    if($prepg){
        $pagenav.="<a href='$url?page=$prepg&KCNumber=$KCNumber&KCName=$KCName&XF=$XF'>上一页</a>";
    }
    for($i=1;$i<=$pagenum;$i++){
        if($page==$i){
            $pagenav.=$i." ";
        }  else {
            $pagenav.="<a href='$url?page=$i&KCNumber=$KCNumber&KCName=$KCName&XF=$XF'>$i</a>";
        }
    }
    if($nextpg){
        $pagenav.="<a href='$url?page=$nextpg&KCNumber=$KCNumber&KCName=$KCName&XF=$XF'>下一页</a>"; 
    }
    $pagenav.="共(".$pagenum.")页";
    echo "<br><div alige=center>".$pagenav."</div>";
        }
?>

