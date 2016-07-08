<?php
	session_start();
	$user = $_SESSION['id'];

	$k=0;
	$ch=array();
	$array="";

	$name=array();
	$day=array();
	$start=array();
	$end=array();
	$teacher=array();
	$class=array();
	$num=array();
	$room=array();
	$building=array();


	require_once ("../config/connect.php");

	$fileds = " curricula.Name,shouke.Day,shouke.Start_week,shouke.End_week,shouke.Start_class,shouke.End_class,shouke.Classroom_Id,building.Name,teacher.Name";
	$table = " student left join curricula on student.Speciality=curricula.Speciality_Id left join shouke on curricula.Id=shouke.Curricula_Id  left join building on shouke.Building_Id=building.Id left join teacher on shouke.Teacher_Id=teacher.Id";
	$where = "student.Id = {$user}";
	$sql = "select {$fileds} from {$table} where {$where} order by shouke.Start_class ASC,shouke.Start_week ASC";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	if($result)
	{
		$data = array();
		while( $row= mysqli_fetch_array($result) )
		{
			$data[]["name"] = $row[0];
			$data[]["day"] = $row[1];
			$data[]["start"] = $row[2];
			$data[]["end"] = $row[3];
			$data[]["teacher"] = $row[4];
			$data[]["class"] = $row[5];
			$data[]["num"] = $row[6];
			$data[]["room"] = $row[7];
			$data[]["building"] = $row[8];
		}
	}
	$ch = '<table><thead><th width="9%">时间</th><th width="13%">周一</th><th width="13%">周二</th><th width="13%">周三</th><th width="13%">周四</th><th width="13%">周五</th><th width="13%">周六</th><th width="13%">周日</th></thead><tbody>';
	for ($i=1;$i<14;$i++)
	{
		$j=0;
		$ch += '<tr id="'+$i+'"><td>第'+$i+'节课</td>';
		while ($j<8);
		{
			while ($day[$k]!=$j)
			{
				$ch += '<td></td>';
				$k++;
				$j++;
			}

			while ($day[$k]==$j)
			{
				$ch += '<td rowspan="'+$data[$k]["num"]+'">'+$data[$k]["name"]+'<br />授课教师'+$data[$k]["teacher"]+'<br />第'+$data[$k]["start"]+'~'+$data[$k]["end"]+'周上课<br />上课地点'+$data[$k]["building"]+$data[$k]["room"]+'</td>';
				$k++;
				$j++;
			}
		}
		$ch += '</tr>';
	}
	$ch += '</tbody></table>';
	echo $ch;
?>
