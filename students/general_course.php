<?php
require_once("../connect.php");
session_start();
$pageSize=10;
// echo $_SESSION['user'];
$user=$_SESSION['user'];
$sql = "select DISTINCT student.Id as '学号',student.Name as '姓名',academy.Name as '学院',speciality.Name as '专业',student.Class as '班级',grade.Name as '年级' from student,academy,speciality,grade,curricula_variable where academy.Id=student.Academy and curricula_variable.Student_Id=student.Id and speciality.Id=student.Speciality and grade.Id=student.Grade and student.Name='$user'";
$total_sql="select count(*) from (select curricula.Id as '课程编号',curricula.Name as '课程名称',curricula_type.Name as '课程性质',curricula.Credit as '学分',curricula.Hours as '学时',speciality.Name as '专业',academy.Name as '学院',curricula.Contain as '课程容量',teacher.Name as '任课教师',building.Name as '教学楼',classroom.Id as '教室',shouke.Start_week as '开始上课周',shouke.End_week as '结束上课周',shouke.Day as '上课时间',shouke.Start_class as '开始上课时间',shouke.End_class as '结束上课时间' from curricula,curricula_type,speciality,academy,teacher,building,classroom,shouke where curricula.Speciality_Id=speciality.Id and curricula.Academy_Id=academy.Id and curricula.Type=curricula_type.Id and shouke.Curricula_Id=curricula.Id and shouke.Building_Id=building.Id and shouke.Classroom_Id=classroom.Id and classroom.Building_Id=building.Id and shouke.Teacher_Id=teacher.Id and curricula_type.Name='通识') sc";
$total_result=mysqli_fetch_array(mysqli_query($conn,$total_sql));
$total=$total_result[0];
$total_pages=ceil($total/$pageSize);
$page=$_GET['p'];
if($page>$total_pages+1){
    echo "<script>alert('无此页'); window.location.href=\"general_course.php?p=1\";
                window.event.returnValue = false;</script>";
}
$showPage=5;
$start=($page-1)*$pageSize;
$sql1="select curricula.Id as '课程编号',curricula.Name as '课程名称',curricula_type.Name as '课程性质',curricula.Credit as '学分',curricula.Hours as '学时',speciality.Name as '专业',academy.Name as '学院',curricula.Contain as '课程容量',teacher.Name as '任课教师',building.Name as '教学楼',classroom.Id as '教室',shouke.Start_week as '开始上课周',shouke.End_week as '结束上课周',shouke.Day as '上课时间',shouke.Start_class as '开始上课时间',shouke.End_class as '结束上课时间' from curricula,curricula_type,speciality,academy,teacher,building,classroom,shouke where curricula.Speciality_Id=speciality.Id and curricula.Academy_Id=academy.Id and curricula.Type=curricula_type.Id and shouke.Curricula_Id=curricula.Id and shouke.Building_Id=building.Id and shouke.Classroom_Id=classroom.Id and classroom.Building_Id=building.Id and shouke.Teacher_Id=teacher.Id and curricula_type.Name='通识' limit {$start},{$pageSize}";
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
$rows=mysqli_num_rows($res1);
if($res1 && $rows>0){
    while($row=mysqli_fetch_assoc($res1)){
        $result_rows[]=$row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>通知预览界面</title>
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function bbb(){

            var text=document.getElementById('aaa').value;
            if(text=='') {
                alert("请输入页号！");
                window.location.href="general_course.php?p=1";
                window.event.returnValue = false;
            }
        }
        function sub(){
            document.forms[0].elements[0].disabled=true;
            document.forms[0].submit();
        }
    </script>
    <style type="text/css">
        body {
            background:#FFF
        }
        div.page{
            background-color: white;
            text-align: center;
            height: 50px;
        }
        div.page input{
            border:1px solid #1D7AD9;
        }
        div.content{
            height: 50px;
        }
        div.page a{
            border:#00f 1px solid;text-decoration: none;padding: 2px 5px 2px 5px;margin: 2px;
        }
        div.page span.current{
            border:blue 1px solid ;background-color: blue;padding: 4px 6px;margin: 2px;color:#fff;font-weight: bold;
        }
        div.page span.disable{
            border:#eee 1px solid;padding:2px 5px;margin: 2px;color :#ddd;
        }
        div.page form{
            display:inline;
        }
    </style>
</head>
<body>
<div id="contentWrap">
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 网上选课 -- 通识</span></div>
    <div class="pageColumn">
        <div class="pageButton1"><p>&nbsp;&nbsp;
        <?php while($row=mysqli_fetch_assoc($res)){?>
        <?php echo "学号：".$row['学号']?>&nbsp;&nbsp;
        <?php echo "姓名：".$row['姓名']?>&nbsp;&nbsp;
        <?php echo "专业：".$row['专业']?>&nbsp;&nbsp;
        <?php echo "学院：".$row['学院']?>&nbsp;&nbsp;
        <?php echo "班级：".$row['班级']?><br />&nbsp;&nbsp;
        <?php echo "2015-2016"."学年第"."2"."学期选课"?>&nbsp;&nbsp;
        <?php echo "年级：".$row['年级']?>&nbsp;&nbsp;
        <?php echo "选课性质：通识"?>
        <?php }?>
            
        </p></div>
        <table>
            <thead>
            <th>课程编号</th>
            <th>课程名称</th>
            <th>课程性质</th>
            <th>学分</th>
            <th>学时</th>
            <th>专业</th>
            <th>学院</th>
            <th>课程容量</th>
            <th>任课教师</th>
            <th>上课地点</th>
            <th>上课周</th>
            <th width="180px">上课时间</th>
            <th width="80px">选课</th>
            </thead>
            <tbody>
                <?php $i=1;foreach($result_rows as $rows):?>
            <tr>
                <td><?php echo $rows['课程编号']?></td>
                <td><?php echo $rows['课程名称']?></td>
                <td><?php echo $rows['课程性质']?></td>
                <td><?php echo $rows['学分']?></td>
                <td><?php echo $rows['学时']?></td>
                <td><?php echo $rows['专业']?></td>
                <td><?php echo $rows['学院']?></td>
                <td><?php echo $rows['课程容量']?></td>
                <td><?php echo $rows['任课教师']?></td>
                <td><?php echo $rows['教学楼']."--".$rows['教室']?></td>
                <td><?php echo $rows['开始上课周']."--".$rows['结束上课周']?></td>
                <td><?php echo "星期".$rows['上课时间']."（".$rows['开始上课时间']."--".$rows['结束上课时间']."）"?></td>
                <td><a href="general_course1.php?selectcourse=<?php echo $rows['课程编号']?>"><input style="border:1px solid #bfd8e0;width:40px;height:20px" type="button" name="selec_tcourse" value="选课"></td></a>
            </tr>
            <?php $i++;endforeach;?>
            </tbody>
        </table>
    </div>
        <div class="content">
        <?php
        mysqli_close($conn);
        $page_banner="<div class='page'>";
        $page_offset=($showPage-1)/2;

        if($page>1){
            $page_banner.="<br/><a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
            $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
        }else{
            $page_banner.="<span class='disable'>首页</a></span>";
            $page_banner.="<span class='disable'><上一页</a></span>";
        }
        $start=1;
        $end=$total_pages;
        if($total_pages>$showPage){
            if($page>$page_offset+1){
                $page_banner.="...";
            }
            if($page>$page_offset){
                $start=$page-$page_offset;
                $end=$total_pages>$page+$page_offset?$page+$page_offset:$total_pages;
            }else{
                $start=1;
                $end=$total_pages>$showPage?$showPage:$total_pages;
            }
            if($page+$page_offset>$total_pages){
                $start=$start-($page+$page_offset-$end);

            }
        }
        for($i=$start;$i<$end;$i++){
            if($page==$i){
                $page_banner.="<span class='current'>{$i}</span>";
            }else{
                $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
            }
        }
        if($total_pages>$showPage && $total_pages>$page+$page_offset){
            $page_banner.="...";
        }
        if($page<$total_pages){
            $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
            $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
        }
        $page_banner.="共{$total_pages}页,";
        $page_banner.="<form action='general_course.php' method='get'>";
        $page_banner.="跳转到第<input type='text' size='3' name='p' id='aaa'>页";
        $page_banner.="<input type='submit' value='确定' onclick='bbb()'>";
        $page_banner.="</form></div>";
        echo $page_banner;?>
    </div>
    </div>
</body>
</html>