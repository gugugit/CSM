<?php
header("Content-Type:text/html ;charset=utf-8");
session_start();
require_once ("../connect.php");
$student=$_SESSION['id'];
$year=$_GET['select1'];
$term=$_GET['select2'];
// $sql="select shouke.Classroom_Id,shouke.Day,shouke.Start_class,shouke.End_class,shouke.Start_week,shouke.End_week,teacher.Name,curricula.Name,building.Name,curricula_variable.Year,curricula_variable.Term from shouke,teacher,student,curricula,building,curricula_variable where student.Id='$student' and student.Id= curricula_variable.Student_Id and curricula_variable.Year='$year' and curricula_variable.Term='$term' and curricula_variable.Curricula_Id=shouke.Curricula_Id and curricula_variable.Curricula_Id=curricula.Id and shouke.Teacher_Id=teacher.Id and building.Id=shouke.Building_Id ";
$sql="select shouke.Classroom_Id,shouke.Day,shouke.Start_class,shouke.End_class,shouke.Start_week,shouke.End_week,teacher.Name,curricula.Name,building.Name,curricula_variable.Year,curricula_variable.Term from shouke inner join teacher on shouke.Teacher_Id=teacher.Id inner join building on building.Id=shouke.Building_Id inner join curricula_variable on curricula_variable.Curricula_Id=shouke.Curricula_Id inner join curricula on curricula.Id=shouke.Curricula_Id inner join student on student.Id= curricula_variable.Student_Id  and student.Id='$student' and curricula_variable.Year='$year' and curricula_variable.Term='$term'";
$result =mysqli_query($conn,$sql);
$sum=array();
$pos=0;
$Rank=array("08:00:00"=>1,"08:50:00"=>2,"09:50:00"=>3,"10:45:00"=>4,"11:35:00"=>5,"13:00:00"=>6,"13:50:00"=>7,"14:50:00"=>8,"15:45:00"=>9,"16:35:00"=>10,"18:00:00"=>11,"18:50:00"=>12,"19:45:00"=>13);
while($arr=mysqli_fetch_array($result)){
    $sum[]=$arr;
    $pos++;
}
$top=$pos;
$time1="01:35:00";
$time2="02:30:00";
for($k=0;$k<$pos;$k++) {
    for($m=1;$m<=13;$m++){
        if($Rank[$sum[$k][2]]==$m){
            if(gmstrftime('%H:%M:%S',strtotime($sum[$k][3])-strtotime($sum[$k][2]))==$time1){
                $end1 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end1, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8],$sum[$k][9]);
            }
            else if(gmstrftime('%H:%M:%S',strtotime($sum[$k][3])-strtotime($sum[$k][2]))==$time2){
                if($Rank[$sum[$k][2]]<11) {
                    $end2 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                    $start1 = date("H:i:s", strtotime("+55 min", strtotime($sum[$k][2])));
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $start1, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8],$sum[$k][9]);
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end2, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8],$sum[$k][9]);
                }
                else if($Rank[$sum[$k][2]]==11){
                    $end3 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                    $start2 = date("H:i:s", strtotime("+50 min", strtotime($sum[$k][2])));
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $start2, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8],$sum[$k][9]);
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end3, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8],$sum[$k][9]);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" />
</head>
<body >
<table class="table table-bordered table-striped" align="center" id="table1" >
    <thead align="center">
    <td>时间</td>
    <td>星期一</td>
    <td>星期二</td>
    <td>星期三</td>
    <td>星期四</td>
    <td>星期五</td>
    </thead>
    <tbody align="center" >
    <?php
    for($i=1;$i<=13;$i++){?>
        <tr >
            <td><?php echo "第{$i}节"?></td>
            <?php
            for($j=1;$j<=5;$j++){?>
                <td>
                    <?php for($k=0;$k<$top;$k++){
                        if($Rank[$sum[$k][2]]==$i && $sum[$k][1]==$j)
                            echo"{$sum[$k][7]}<br>{$sum[$k][6]}<br>第{$sum[$k][4]}-{$sum[$k][5]}周<br>{$sum[$k][8]} {$sum[$k][0]}";
                        //{$sum[$k][0]}<br>{$sum[$k][1]}<br>{$sum[$k][2]}<br>{$sum[$k][3]}<br>
                    }?>
                </td>
            <?php }?>
        </tr>
    <?php }?>
    </tbody>
</table>
</body>
</html>
