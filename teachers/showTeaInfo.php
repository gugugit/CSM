<?php
require_once("../connect.php");
session_start();
$user=$_SESSION['id'];
$sql="select teacher.Id as '职工号',teacher.Name as '姓名',teacher.Sex as '性别',academy.Name as '学院',speciality.Name as '专业',permission.Name as '权限', teacher.Dates_Enrollment as '入校时间',teacher.Phone as '电话',teacher.Identification_Card as '身份证号',teacher.Nation as '民族',teacher.BirthPlace as '籍贯',teacher.BirthDay as '生日',teacher.EMail as '邮箱' from teacher,academy,speciality,permission where teacher.Academy=academy.Id and teacher.Speciality=speciality.Id and teacher.Permission=permission.Id and teacher.Id='$user'";
$res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>通知预览界面</title>
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            background:#FFF
        }
    </style>
</head>
<body>
<div id="contentWrap">
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息维护 -- 个人信息</span></div>
    <div class="pageColumn">
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;教师个人信息展示</h1></div>
        <table>
            <thead>
            <th>职工号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>学院</th>
            <th>专业</th>
            <th>权限</th>
            <th>入校时间</th>
            <th>电话</th>
            <th>身份证号</th>
            <th>民族</th>
            <th>籍贯</th>
            <th>生日</th>
            <th>邮箱</th>
            </thead>
            <tbody>
            <?php while($rows=mysqli_fetch_assoc($res)){?>
                <tr> 
                <td><?php echo $rows['职工号']?></td>
                <td><?php echo $rows['姓名']?></td>
                <td><?php echo $rows['性别']?></td>
                <td><?php echo $rows['学院']?></td>
                <td><?php echo $rows['专业']?></td>
                <td><?php echo $rows['权限']?></td>
                <td><?php echo $rows['入校时间']?></td>
                <td><?php echo $rows['电话']?></td>
                <td><?php echo $rows['身份证号']?></td>
                <td><?php echo $rows['民族']?></td>
                <td><?php echo $rows['籍贯']?></td>
                <td><?php echo $rows['生日']?></td>
                <td><?php echo $rows['邮箱']?></td>
                </tr>
                <?php }?>
            </tbody>
        </table> 
    </div></div>
</body>
</html>