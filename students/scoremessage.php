<?php 
/*function operation($sql1,$title){
	$sql=$sql1;
	$result=$mysqli->query($sql);
	while ($row=$result->fetch_array())
	{$result1=$row[$title]}
	return $result1;
}*/
$sql="SELECT * FROM student WHERE Id like '{$_SESSION['ID']}'";
$result=$mysqli->query($sql);
while ($row=$result->fetch_array())
{$Name=$row['Name'];//姓名
$AcaID=$row['Academy'];//学院
$Class=$row['Class'];//班级
$spID=$row['Speciality'];}//专业ID

$sql="SELECT * FROM academy WHERE Id like '{$AcaID}'";
$result=$mysqli->query($sql);
while ($row=$result->fetch_array())
{$Aca=$row['Name'];}//学院名

$sql="SELECT * FROM speciality WHERE Id like '{$spID}'";
$result=$mysqli->query($sql);
while ($row=$result->fetch_array())
{$Sp=$row['Name'];}//专业名

//已选学分
$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}'";
$result=$mysqli->query($sql);
$sumscore=0;
while ($row=$result->fetch_array()){
	$sql="select * from curricula where Id like'{$row['Curricula_Id']}'";
	$result1=$mysqli->query($sql);
	while ($row1=$result1->fetch_array())
	{$sumscore+=$row1['Credit'];}
}

//获得学分
$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}' and Score >= 60";
$result=$mysqli->query($sql);
$getscore=0;
while ($row=$result->fetch_array()){
	$sql="select * from curricula where Id like'{$row['Curricula_Id']}'";
	$result1=$mysqli->query($sql);
	while ($row1=$result1->fetch_array())
	{$getscore+=$row1['Credit'];}
}


?>