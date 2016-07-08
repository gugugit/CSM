<?php
error_reporting(0);
header("Content-Type:text/html ;charset=utf-8");
//$mysql = new mysqli("localhost","root","root","management");
require_once("../config/connect.php");
mysqli_query($conn,"set names 'utf8'");
if(mysqli_connect_error()){
    echo 'Could not connect to database.';
    exit;
}

$use=$_POST['us'];

//$sql=
//$result = $mysql->query("select `Curricula_Id`,`Day`,`Start_class`, `End_class` from `shouke`");
$result = mysqli_query($conn,"SELECT curricula.Name,building.Name,Start_class,End_class,shouke.Classroom_Id,shouke.Day,shouke.Start_week,shouke.End_week FROM shouke INNER JOIN curricula ON shouke.Curricula_Id=curricula.Id INNER JOIN building ON building.Id=shouke.Building_Id INNER JOIN teacher ON teacher.Id=shouke.Teacher_Id and teacher.Name= '$use'");
$sum=array();
$pos;
$Rank=array("08:00:00"=>1,"08:50:00"=>2,"09:50:00"=>3,"10:45:00"=>4,"11:35:00"=>5,"13:00:00"=>6,"13:50:00"=>7,"14:50:00"=>8,"15:45:00"=>9,"16:35:00"=>10,"18:00:00"=>11,"18:50:00"=>12,"19:45:00"=>13);
while($arr=mysqli_fetch_array($result))
{
    $sum[]=$arr;
    $pos++;
}

$top=$pos;
$time1="01:35:00";
$time2="02:30:00";
for($k=0;$k<$pos;$k++) 
{
    for($m=1;$m<=13;$m++)
	{
        if($Rank[$sum[$k][2]]==$m)
		{
            if(gmstrftime('%H:%M:%S',strtotime($sum[$k][3])-strtotime($sum[$k][2]))==$time1)
			{
                $end1 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end1, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7]);
            }
            else if(gmstrftime('%H:%M:%S',strtotime($sum[$k][3])-strtotime($sum[$k][2]))==$time2)
			{
                if($Rank[$sum[$k][2]]<11) 
				{
                    $end2 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                    $start1 = date("H:i:s", strtotime("+55 min", strtotime($sum[$k][2])));
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $start1, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7]);
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end2, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7]);
                }
                else if($Rank[$sum[$k][2]]==11)
				{
                    $end3 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                    $start2 = date("H:i:s", strtotime("+50 min", strtotime($sum[$k][2])));
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $start2, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7]);
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end3, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7]);
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
    <link href="../images/bootstrap.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript">   </script>
</head>
<body >
<table class="table table-bordered table-striped" align="center" id="table1" >
    <thead align="center">
    <td>
        时间
    </td>
    <td>
        周一
    </td>
    <td>
        周二
    </td>
    <td>
        周三
    </td>
    <td>
        周四
    </td>
    <td>
        周五
    </td>
	<td>
        周六
    </td>
	<td>
        周天
    </td>
    </thead>
    <tbody align="center" >
    <?php
    for($i=1;$i<=13;$i++){?>
        <tr >
            <td><?php echo "第{$i}节"?></td>
            <?php
            for($j=1;$j<=7;$j++){?>
                <td>
                    <?php for($k=0;$k<$top;$k++)
					{
                        if($Rank[$sum[$k][2]]==$i && $sum[$k][5]==$j)
							//SELECT curricula.Name,building.Name,Start_class,End_class,classroom.Id ,Day
                            echo"{$sum[$k][0]}<br>{$sum[$k][1]}<br>{$sum[$k][4]}<br>{$use}<br>{$sum[$k][6]}-{$sum[$k][7]}";
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
