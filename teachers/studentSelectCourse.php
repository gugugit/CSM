<?php
header("Content-Type:text/html ;charset=utf-8");
session_start();
require_once ("../connect.php");
$page=1;
$page=$_GET['p'];
$pageSize=10;
$teacher=$_SESSION['id'];
$course=$_GET['coursename'];
$total_sql="select count(*) from (select distinct student.Id,student.Name as sname,student.Class,student.Phone,speciality.Name from student,speciality,shouke,curricula_variable,curricula where shouke.Teacher_Id='$teacher' and shouke.Curricula_Id=curricula_variable.Curricula_Id and student.Id=curricula_variable.Student_Id and curricula.Speciality_Id=speciality.Id and curricula.Name='$course' and curricula.Id=shouke.Curricula_Id) sc";
$total_result=mysqli_fetch_array(mysqli_query($conn,$total_sql));
$total=$total_result[0];
$total_pages=ceil($total/$pageSize);
if($page>$total_pages+1){
	echo "<script>alert('无此页'); window.location.href=\"studentSelectCourse.php?p=1\";
                window.event.returnValue = false;</script>";
}
$showPage=5;
$start=($page-1)*$pageSize;
$sql1="select distinct student.Id,student.Name as sname,student.Class,student.Phone,speciality.Name from student,speciality,shouke,curricula_variable,curricula where shouke.Teacher_Id='$teacher' and shouke.Curricula_Id=curricula_variable.Curricula_Id and student.Id=curricula_variable.Student_Id and curricula.Speciality_Id=speciality.Id and curricula.Name='$course' and curricula.Id=shouke.Curricula_Id limit {$start},{$pageSize}";
$res1=mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>通知预览界面</title>
	<link href="../images/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/bootstrap.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript">
		function bbb(){
			var text=document.getElementById('aaa').value;
			if(text=='') {
				alert("请输入页号！");
				window.location.href="studentSelectCourse.php?p=1";
				window.event.returnValue = false;
			}
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
		<table class="table table-bordered table-striped" align="center">
			<thead align="center">
			<td>
				学号
			</td>
			<td>
				姓名
			</td>
			<td>
				专业
			</td>
			<td>
				班级
			</td>
			<td>
				联系方式
			</td>
			</thead>
			<tbody align="center">
				<?php while($arr=mysqli_fetch_array($res1)){
					?>
					<tr>
						<td><?php echo $arr['Id']?></td>
						<td><?php echo $arr['sname']?></td>
						<td><?php echo $arr['Name']?></td>
						<td><?php echo $arr['Class']?></td>
						<td><?php echo $arr['Phone']?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>

		<?php
		$page_banner="<div class='page'>";
		$page_offset=($showPage-1)/2;

		if($page>1){
			$page_banner.="<br/><a href='".$_SERVER['PHP_SELF']."?p=1 &coursename=".$course."'>首页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."&coursename=".$course."'><上一页</a>";
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
				$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".$i."&coursename=".$course.">{$i}</a>";
			}
		}
		if($total_pages>$showPage && $total_pages>$page+$page_offset){
			$page_banner.="...";
		}
		if($page<$total_pages){
			$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($page+1)."&coursename=".$course.">下一页></a>";
			$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($total_pages)."&coursename=".$course.">尾页</a>";
		}
		$page_banner.="共{$total_pages}页,";
		$page_banner.="<form action='studentSelectCourse.php?p=1&coursename=".$course."' method='get'>";
		$page_banner.="跳转到第<input type='text' size='3' name='p' id='aaa'>页";
		$page_banner.="<input type='submit' value='确定' onclick='bbb()'>";
		$page_banner.="</form></div>";
		echo $page_banner;?>

</div>
</body>
</html>