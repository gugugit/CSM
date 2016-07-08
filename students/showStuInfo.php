<?php
require_once("../connect.php");
session_start();
$user=$_SESSION['id'];
$sql="select student.Id as '学号',student.Name as '姓名',student.Sex as '性别',academy.Name as '学院',speciality.Name as '专业',student.Class as '班级',grade.Name as '年级',permission.Name as '权限', student.Dates_Attendance as '入学时间',student.Phone as '电话',student.Identification_Card as '身份证号',student.Nation as '民族',student.BirthPlace as '籍贯',student.BirthDay as '生日',student.EMail as '邮箱' from student,academy,speciality,grade,permission where student.Academy=academy.Id and student.Speciality=speciality.Id and student.Grade=grade.Id and student.Permission=permission.Id and student.Id='$user'";
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
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;学生个人信息展示</h1></div>
        <table>
            <thead>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>学院</th>
            <th>专业</th>
            <th>班级</th>
            <th>年级</th>
            <th>权限</th>
            <th>入学时间</th>
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
                <td><?php echo $rows['学号']?></td>
                <td><?php echo $rows['姓名']?></td>
                <td><?php echo $rows['性别']?></td>
                <td><?php echo $rows['学院']?></td>
                <td><?php echo $rows['专业']?></td>
                <td><?php echo $rows['班级']?></td>
                <td><?php echo $rows['年级']?></td>
                <td><?php echo $rows['权限']?></td>
                <td><?php echo $rows['入学时间']?></td>
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