<?php
session_start();
header("Content-Type:text/html ;charset=utf-8");
require_once("../connect.php");
$teacher=$_SESSION['id'];
$sql="select curricula.Name,curricula.Credit,curricula.Hours,curricula_type.Name as type,curricula.Contain,shouke.Classroom_Id,shouke.Start_week,shouke.End_week,shouke.Day,shouke.Start_class,shouke.End_class,building.Name as building from curricula,shouke,building,curricula_type where shouke.Teacher_Id='$teacher'and shouke.Curricula_Id=curricula.Id and shouke.Building_Id=building.Id and curricula_type.Id=curricula.Type";
$result =mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
<div id="contentWrap">
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息查询 -- 课程信息查询</span></div>
    <div class="pageColumn">
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;课程信息查询统计表</h1></div>
<table class="table table-bordered table-striped" align="center" id="table1" >
    <thead align="center">
    <td>
        课程名称
    </td>
    <td>
        学分
    </td>
    <td>
        学时
    </td>
    <td>
        课程类型
    </td>
    <td>
        课程容量
    </td>
    <td>
        教室
    </td>
    <td>
        星期
    </td>
    <td>
        开始结束周
    </td>
    <td>
        开始结束时间
    </td>
    </thead>
    <tbody align="center">
    <?php while($arr=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $arr['Name']?></td>
            <td><?php echo $arr['Credit']?></td>
            <td><?php echo $arr['Hours']?></td>
            <td><?php echo $arr['type']?></td>
            <td><?php echo $arr['Contain']?></td>
            <td><?php echo "{$arr['building']} {$arr['Classroom_Id']}"?></td>
            <td><?php echo $arr['Day']?></td>
            <td><?php echo "{$arr['Start_week']}—{$arr['End_week']}"?></td>
            <td><?php echo "{$arr['Start_class']}—{$arr['End_class']}"?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
</div></div>
</body>
</html>