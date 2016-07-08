<?php
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
		return mysqli_fetch_array($result_1)["Hours"] - ((int)$select_end_week - (int)$select_start_week + 1) * (int)$temp[$select_time] -> lesson - ((int)$select_end_week_1 - (int)$select_start_week_1 + 1) * (int)$temp[$select_time_1] -> lesson;
	}

	if (empty($_POST['select2']) || (empty($_POST['select4']) && empty($_POST['select3']))) {
		echo "<script>window.alert('该课的上课时间与你排的时间不符');window.history.go(-1);</script>";
	}  else {
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

	  	$Classroom_Id_1 = 0;

		$Curricula_Id = (int)$_POST['select2'];
		$Building_Id = (int)explode("_",$_POST['select4'])[0];
		if (!empty($_POST['select4'])) $Classroom_Id = (int)explode("_",$_POST['select4'])[1];
		$Teacher_Id = (int)$_POST['select3'];
		$Start_week = (int)$_POST['select_start_week'];
		$End_week = (int)$_POST['select_end_week'];
		$Day = (int)$_POST['select_day'];
		$Start_class = $temp[$_POST['select_time']] -> start_time;
		$End_class = $temp[$_POST['select_time']] -> end_time;
		$shouketime = (int)$_POST['select_time'];


		$Classroom_Id_1 = 0;
		$Building_Id_1 = (int)explode("_",$_POST['select4_1'])[0];
		if (!empty($_POST['select4_1'])) $Classroom_Id_1 = (int)explode("_",$_POST['select4_1'])[1];
		$Teacher_Id_1 = (int)$_POST['select3_1'];
		$Start_week_1 = (int)$_POST['select_start_week_1'];
		$End_week_1 = (int)$_POST['select_end_week_1'];
		$Day_1 = (int)$_POST['select_day_1'];
		$Start_class_1 = $temp[$_POST['select_time_1']] -> start_time;
		$End_class_1 = $temp[$_POST['select_time_1']] -> end_time;
		$shouketime_1 = (int)$_POST['select_time_1'];


		if (Get_reset_hours($Curricula_Id,$Start_week,$End_week,$shouketime,$Start_week_1,$End_week_1,$shouketime_1) != 0) {
			echo "<script>window.alert('该课的上课时间与你排的时间不符');window.history.go(-1);</script>";
		}
		else {
			$mysql = new mysqli("localhost","root","","management");
		    $mysql->query("set names utf8");

		    if ($Classroom_Id != 0) {
		    	$sql = "INSERT INTO shouke VALUES (NULL,{$Curricula_Id},{$Building_Id},{$Classroom_Id},{$Teacher_Id},{$Start_week},{$End_week},{$Day},'{$Start_class}','{$End_class}',${shouketime}
		    	)";

		   		$query = $mysql -> query($sql);

		    }

			if ($Classroom_Id_1 != 0) {
				$sql = "INSERT INTO shouke VALUES (NULL,{$Curricula_Id},{$Building_Id_1},{$Classroom_Id_1},{$Teacher_Id_1},{$Start_week_1},{$End_week_1},{$Day_1},'{$Start_class_1}','{$End_class_1}',${shouketime_1}
		    	)";

		    	$query = $mysql -> query($sql);
			}


			echo "<script>window.alert('插入成功');window.history.go(-1); </script>";
		}

	}

	
?>
