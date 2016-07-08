<?php

  function Get_Speciality($Id) {
    if ($Id != '#') {
      $mysql = new mysqli("localhost","root","","management");
      $mysql->query("set names utf8");
      $result = $mysql -> query("SELECT * FROM speciality");
      $sum_1 = array();
      while ($arr=mysqli_fetch_array($result)) {
        $sum_1[] = $arr;
      }
      echo "<option selected value = '0'>请选择专业</option>";
      foreach ($sum_1 as $key => $value) {
        echo "<option value = {$value['Id']}> {$value['Name']} </option>";
      }
    }
  }

  #查找该专业的课程
  function Get_curricula($Speciality_Id) {
      $mysql = new mysqli("localhost","root","","management");
      $mysql->query("set names utf8");
      $sql = "SELECT curricula.Id,curricula.Name,curricula.Hours FROM curricula
       WHERE curricula.Speciality_Id = {$Speciality_Id} &&
       curricula.Id NOT IN (SELECT shouke.Curricula_Id FROM shouke)";
      $result_2 = $mysql -> query($sql);
      $sum_2 = array();
      while ($arr=mysqli_fetch_array($result_2)) {
        $sum_2[] = $arr;
      }
      echo "<option selected value = '0'>请选择课程</option>";
      if (!empty($sum_2)) {
        $temp = 1;
        $ID = 0;
        foreach ($sum_2 as $key => $value) {
            if ($temp == 1) {
              $temp ++;
              $ID = $value['Id'];
            }
            echo "<option value = {$value['Id']}> {$value['Name']} </option>";
        }
        return $ID;
      }
  }

  function check($Id,$Name,$select_start_week,$select_end_week,$select_day,$select_time) {
    $mysql = new mysqli("localhost","root","","management");
    $mysql->query("set names utf8");
    $sql = "select * from shouke where shouke.Teacher_Id = {$Id}";
    $result = $mysql -> query($sql);
    while ($arr=mysqli_fetch_array($result)) {
        if ((int)$arr['shouketime'] == (int)$select_time) {
          if ((int)$arr['Day'] == (int)$select_day) {
            if (((int)$select_start_week >= (int)$arr['Start_week'] && (int)$select_start_week <= (int)$arr['End_week']) || ((int)$select_end_week >= (int)$arr['Start_week'] && (int)$select_end_week <= (int)$arr['End_week']) ) {
              return false;
            }
          }
        }
    }
    return true;
  }

  #选择可以教授这门课的空闲的老师
  function Get_teacher($curricula_id,$select_start_week,$select_end_week,$select_day,$select_time) {
    if ($curricula_id != '#') {
      $mysql = new mysqli("localhost","root","","management");
      $mysql->query("set names utf8");
      $sql = "SELECT teacher.Id,teacher.Name FROM teacher INNER JOIN teacher_curricula on teacher_curricula.Curricula_Id = {$curricula_id} AND teacher_curricula.Teacher_Id = teacher.Id";
      $result_4 = $mysql -> query($sql);
      $sum_4 = array();

      while ($arr=mysqli_fetch_array($result_4)) {
        $sum_4[] = $arr;
      } 
      echo "<option selected value = '0'>请选择老师</option>";
      foreach ($sum_4 as $key => $value) {
        if (check($value['Id'],$value['Name'],$select_start_week,$select_end_week,$select_day,$select_time))
          echo "<option value = {$value['Id']}> {$value['Name']} </option>";
      }
    }
  }

  function check2($Building_Id,$Classroom_Id,$select_start_week,$select_end_week,$select_day,$select_time) {
    $mysql = new mysqli("localhost","root","","management");
    $mysql->query("set names utf8");
    $sql = "select * from shouke where shouke.Building_Id = {$Building_Id} && shouke.Classroom_Id = {$Classroom_Id}";
    $result = $mysql -> query($sql);
    while ($arr=mysqli_fetch_array($result)) {
      if ((int)$arr['shouketime'] == (int)$select_time) {
        if ((int)$arr['Day'] == (int)$select_day) {
          if (((int)$select_start_week >= (int)$arr['Start_week'] && (int)$select_start_week <= (int)$arr['End_week']) || ((int)$select_end_week >= (int)$arr['Start_week'] && (int)$select_end_week <= (int)$arr['End_week']) ) {
            return false;
          }
        }
      }
    }
    return true;
  }

  #选出所有可以容纳课程数量的空闲的教室
  function Get_classroom($curricula_id,$select_start_week,$select_end_week,$select_day,$select_time) {
    if ($curricula_id != '#') {
      $mysql = new mysqli("localhost","root","","management");
      $mysql->query("set names utf8");
      $sql = "SELECT building.Id AS Building_Id,building.Name AS Building_Name,classroom.Id AS Classroom_Id FROM classroom INNER JOIN building ON building.Id = classroom.Building_Id WHERE classroom.Contain >= (SELECT Contain FROM curricula WHERE curricula.id = {$curricula_id})";
      $result_3 = $mysql -> query($sql);
      $sum_3 = array();
      while ($arr=mysqli_fetch_array($result_3)) {
        $sum_3[] = $arr;
      }
      echo "<option selected value = '0'>请选择教室</option>";
      foreach ($sum_3 as $key => $value) {
        if (check2($value['Building_Id'],$value['Classroom_Id'],$select_start_week,$select_end_week,$select_day,$select_time)) 
          echo "<option value = {$value['Building_Id']}_{$value['Classroom_Id']}> {$value['Building_Name']} {$value['Classroom_Id']}</option>";
      }
    }
  }

  #得到这门课剩余没有选的课时
  function Get_reset_hours($curricula_id,$select_start_week,$select_end_week,$select_time,$select_start_week_1,$select_end_week_1,$select_time_1) {
    $json = '{
      "0":{"start_time":"08:00","end_time":"08:00","lesson":"0"},
      "1":{"start_time":"08:00","end_time":"09:35","lesson":"2"},
      "2":{"start_time":"09:50","end_time":"12:20","lesson":"3"},
      "3":{"start_time":"13:00","end_time":"14:35","lesson":"2"},
      "4":{"start_time":"14:45","end_time":"17:15","lesson":"3"},
      "5":{"start_time":"18:00","end_time":"20:35","lesson":"3"}
    }';
    $a = json_decode($json);
    $temp = array();
    foreach ($a as $key => $value) {
      $temp[$key] = $value;
    }

    $sql_1 = "SELECT curricula.Hours FROM curricula WHERE curricula.Id = {$curricula_id}";
    $mysql = new mysqli("localhost","root","","management");
    $mysql->query("set names utf8");

    $result_1 = $mysql -> query($sql_1);
    echo mysqli_fetch_array($result_1)["Hours"] - ((int)$select_end_week - (int)$select_start_week + 1) * (int)$temp[$select_time] -> lesson - ((int)$select_end_week_1 - (int)$select_start_week_1 + 1) * (int)$temp[$select_time_1] -> lesson;
  }

  function Get_table($curricula) {
    $mysql = new mysqli("localhost","root","","management");
    $mysql->query("set names utf8");
    $result = $mysql -> query("SELECT curricula.Name,building.Name,shouke.Start_class,shouke.End_class,shouke.Classroom_Id ,shouke.Day,teacher.Name,shouke.Start_week,shouke.End_week FROM shouke inner JOIN building on building.Id = shouke.Building_Id INNER JOIN curricula on shouke.Curricula_Id = curricula.Id AND curricula.Speciality_Id = {$curricula} INNER JOIN teacher on teacher.Id = shouke.Teacher_Id");

    $sum=array();
    $pos = 0;
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
            if($Rank[$sum[$k][2]  ]==$m)
        {
                if(gmstrftime('%H:%M:%S',strtotime($sum[$k][3])-strtotime($sum[$k][2]))==$time1)
          {
                    $end1 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                    $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end1, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8]);
                }
                else if(gmstrftime('%H:%M:%S',strtotime($sum[$k][3])-strtotime($sum[$k][2]))==$time2)
          {
                    if($Rank[$sum[$k][2]]<11) 
            {
                        $end2 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                        $start1 = date("H:i:s", strtotime("+55 min", strtotime($sum[$k][2])));
                        $sum[$top++] = array($sum[$k][0], $sum[$k][1], $start1, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8]);
                        $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end2, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8]);
                    }
                    else if($Rank[$sum[$k][2]]==11)
            {
                        $end3 = date("H:i:s", strtotime("-45 min", strtotime($sum[$k][3])));
                        $start2 = date("H:i:s", strtotime("+50 min", strtotime($sum[$k][2])));
                        $sum[$top++] = array($sum[$k][0], $sum[$k][1], $start2, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8]);
                        $sum[$top++] = array($sum[$k][0], $sum[$k][1], $end3, $sum[$k][3],$sum[$k][4],$sum[$k][5],$sum[$k][6],$sum[$k][7],$sum[$k][8]);
                    }
                }
            }
        }
    }
    echo "<table class=\"table table-bordered table-striped\" align=\"center\" id=\"table1\" >
    <thead align=\"center\">
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
    <tbody align=\"center\" >";

    for($i=1;$i<=13;$i++){
        echo "<tr >";
            echo "<td>";
            echo "第{$i}节";
            echo "</td>";
            for($j=1;$j<=7;$j++){
                echo "<td>";
                    for($k=0;$k<$top;$k++)
                    {
                        if($Rank[$sum[$k][2]]==$i && $sum[$k][5]==$j)
                            echo"{$sum[$k][0]}<br>{$sum[$k][1]}<br>{$sum[$k][4]}<br>{$sum[$k][6]}<br>{$sum[$k][7]}-{$sum[$k][8]}";
                    }
                echo "</td>";
            }
        echo "</tr>";
    }
    echo "</tbody>
    </table>
    </body>";
  }

  if (isset($_POST['speciality_id']) and !empty($_POST['speciality_id'])) {
    Get_curricula($_POST['speciality_id']);
  }

  if (isset($_POST['curricula_id_2']) and !empty($_POST['curricula_id_2'])) {
    Get_classroom($_POST['curricula_id_2'],$_POST['select_start_week'],$_POST['select_end_week'],$_POST['select_day'],$_POST['select_time']);
  }

  if (isset($_POST['curricula_id_2_2_1']) and !empty($_POST['curricula_id_2_2_1'])) {
    Get_classroom($_POST['curricula_id_2_2_1'],$_POST['select_start_week_1'],$_POST['select_end_week_1'],$_POST['select_day_1'],$_POST['select_time_1']);
  }

  if (isset($_POST['curricula_id_3']) and !empty($_POST['curricula_id_3'])) {
    Get_reset_hours($_POST['curricula_id_3'],$_POST['select_start_week'],$_POST['select_end_week'],$_POST['select_time'],$_POST['select_start_week_1'],$_POST['select_end_week_1'],$_POST['select_time_1']);
  }

  if (isset($_POST['curricula_id']) and !empty($_POST['curricula_id'])) {
    Get_teacher($_POST['curricula_id'],$_POST['select_start_week'],$_POST['select_end_week'],$_POST['select_day'],$_POST['select_time']);
  }

  if (isset($_POST['curricula_id_2_1']) and !empty($_POST['curricula_id_2_1'])) {
    Get_teacher($_POST['curricula_id_2_1'],$_POST['select_start_week_1'],$_POST['select_end_week_1'],$_POST['select_day_1'],$_POST['select_time_1']);
  }

  if (isset($_POST['curricula_id_10']) and !empty($_POST['curricula_id_10'])) {
    Get_table($_POST['curricula_id_10']);
  }

?>
