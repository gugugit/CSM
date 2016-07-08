<?php
class theline{
private $t1=1111;
private $t2=2222;
private $t3=3333;
private $t4=4444;
private $t5=5555;
private $t6=6666;
private $t7=7777;
private $t8=888;
private $t9=999;

public function  add6lines(){
	echo "<tr>";
	echo "<td>".$this->t1."</td>";
	echo "<td>".$this->t2."</td>";
	echo "<td>".$this->t3."</td>";
	echo "<td>".$this->t4."</td>";
	echo "<td>".$this->t5."</td>";
	echo "<td>".$this->t6."</td>";
	echo "</tr>";
}

public function  add6lines_web(){
	$i=2;
	echo "<tr>";
	$_SESSION["ID"]=$this->t1;
	echo "<td><p><a href=\"http://localhost:8080/score/scorestatistic.php\" target=\"_blank\">.$this->t1.</a></p></td>";
	/*<form name="form1"method="POST" action="">
	查询 ：<input type="text" name="search" size=30>
	<input type="submit" value="确定" name="submit">
	</form>*/
	//echo "<td>".$this->t1."</td>";
	/*echo "<td><form name=\"form".$i++."\"method=\"POST\" action=\"\">
		 <input type=\"submit\" value=\"".$this->t1."\" name=\"submit".$i++."\">
		 </form></td>";*/
	echo "<td>".$this->t2."</td>";
	echo "<td>".$this->t3."</td>";
	echo "<td>".$this->t4."</td>";
	echo "<td>".$this->t5."</td>";
	echo "<td>".$this->t6."</td>";
	echo "</tr>";
	/*echo "if(!empty($_POST[\"submit".$i."\"]))
	 {
	 $_SESSION['ID']=document.getElementById("submit".$i).value;
	 <meta http-equiv=\"refresh\" content=\"5;url=score004.php																																																														\">
	 }";*/
}

public function  add5lines(){
	echo "<tr>";
	echo "<td>".$this->t1."</td>";
	echo "<td>".$this->t2."</td>";
	echo "<td>".$this->t3."</td>";
	echo "<td>".$this->t4."</td>";
	echo "<td>".$this->t5."</td>";
	echo "</tr>";
}

public function  add9lines(){
	echo "<tr>";
	echo "<td>".$this->t1."</td>";
	echo "<td>".$this->t2."</td>";
	echo "<td>".$this->t3."</td>";
	echo "<td>".$this->t4."</td>";
	echo "<td>".$this->t5."</td>";
	echo "<td>".$this->t6."</td>";
	echo "<td>".$this->t7."</td>";
	echo "<td>".$this->t8."</td>";
	echo "<td>".$this->t9."</td>";
	echo "</tr>";
}

public function manager_search(){
	include ("inc.php");
	if(!empty($_POST["search"])){
		//echo "结果为：".$_POST["search"]."";
		//$_SESSION["ID"]=$_POST["search"];
		//header("Location: http://localhost:8080/score/scorestatistic.php");
		//exit;
		$sql="select * from student where Id like '{$_POST["search"]}' or Name like '{$_POST["search"]}' or Sex like '{$_POST["search"]}' or Class like '{$_POST["search"]}' or Nation like '{$_POST["search"]}' or BirthPlace like '{$_POST["search"]}' order by Id asc";
		$result=$mysqli->query($sql);
		while($row=$result->fetch_array())
		{
			$this->t1=$row["Id"];
			$this->t2=$row["Name"];
			$sql="SELECT * FROM speciality WHERE Id like '{$row['Speciality']}'";
			$result1=$mysqli->query($sql);
			while ($row1=$result1->fetch_array())
				$this->t3=$row1['Name'];
				$this->t4=$row['Class'];
				$this->t5=$this->manager_averagescore($this->t1);
				$this->t6=$this->alllcredit($this->t1);
				$this->add6lines_web();
		}
	}
	else{
		$sql="select * from student order by Id asc";
		$result=$mysqli->query($sql);
		while($row=$result->fetch_array())
		{
			$this->t1=$row["Id"];
			$this->t2=$row["Name"];
			$sql="SELECT * FROM speciality WHERE Id like '{$row['Speciality']}'";
			$result1=$mysqli->query($sql);
			while ($row1=$result1->fetch_array())
			$this->t3=$row1['Name'];
			$this->t4=$row['Class'];
			$this->t5=$this->manager_averagescore($this->t1);
			$this->t6=$this->alllcredit($this->t1);
			$this->add6lines_web();
		}
	}
}

public function yearscore(){
	include ("inc.php");
	//学年 学期 课程ID 课程名称 课程性质 学分 绩点 成绩 开课学院
	$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}' order by Year asc,Term asc/";
	$result1=$mysqli->query($sql);
	while($row=$result1->fetch_array())
	{
		$this->t1=$row['Year'];
		$this->t2=$row['Term'];
		$this->t3=$row['Curricula_Id'];
		$this->t7=$this->scoreexchange($row['Score']);
		$this->t8=$row['Score'];
		$result2=$this->find_one("select * from curricula where Id like '{$this->t3}'");
		$this->t4=$result2['Name'];
		$this->t5=$this->find_one("select * from curricula_type where Id like '{$result2['Type']}'")['Name'];
		$this->t6=$result2['Credit'];
		$this->t9=$this->find_one("select * from academy where Id like '{$result2['Academy_Id']}'")['Name'];
		$this->add9lines();
	}
}

public function statistic(){
	include ("inc.php");
	$sql="select * from curricula_type";
	$result=$mysqli->query($sql);
	while($row=$result->fetch_array())
	{
		$this->t1=$row['Name'];
		$aca=$this->find_one("SELECT * FROM student WHERE Id like '{$_SESSION['ID']}'")['Academy'];
		$this->t2=$this->find_one("SELECT * FROM credit_require WHERE Academy_ID like '{$aca}' and Type_ID like '{$row['Id']}'")['Credits'];
		
		$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}' and Score >= 60";
		$result1=$mysqli->query($sql);
		$getscore=0;
		while ($row1=$result1->fetch_array()){
			$sql="select * from curricula where Id like'{$row1['Curricula_Id']}' and Type like '{$row['Id']}'";
			$result2=$mysqli->query($sql);
			while ($row2=$result2->fetch_array())
			{$getscore+=$row2['Credit'];}}
		$this->t3=$getscore;
		
		$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}' and Score < 60";
		$result1=$mysqli->query($sql);
		$getscore=0;
		while ($row1=$result1->fetch_array()){
			$sql="select * from curricula where Id like'{$row1['Curricula_Id']}' and Type like '{$row['Id']}'";
			$result2=$mysqli->query($sql);
			while ($row2=$result2->fetch_array())
			{$getscore+=$row2['Credit'];}}
			$this->t4=$getscore;
			
			$this->t5=$this->t2-$this->t3; 
		
		$this->add5lines();
	}
}

public function hightestscore(){
	include ("inc.php");
	$sql="SELECT * FROM curricula_variable WHERE Student_Id like '{$_SESSION['ID']}'";
	$result=$mysqli->query($sql);
	while ($row=$result->fetch_array())
	{
		$this->t1=$row['Curricula_Id'];
		$re=$this->find_one("SELECT distinct * FROM curricula WHERE Id like '{$this->t1}'");
		$this->t2=$re['Name'];
		$this->t3=$this->find_one("SELECT * FROM curricula_type WHERE Id like '{$re['Type']}'")['Name'];
		$this->t4=$re['Credit'];
		$this->t5=$row['Score'];
		$this->t6=$this->find_one("SELECT * FROM academy WHERE Id like '{$re['Academy_Id']}'")['Name'];
		$this->add6lines();
	}
}

public function failscore(){
	include ("inc.php");
	$sql="SELECT * FROM curricula_variable WHERE Student_Id like '{$_SESSION['ID']}' and Score<=60";
	$result=$mysqli->query($sql);
	while ($row=$result->fetch_array())
	{
		$this->t1=$row['Curricula_Id'];
		$re=$this->find_one("SELECT * FROM curricula WHERE Id like '{$this->t1}'");
		$this->t2=$re['Name'];
		$this->t3=$this->find_one("SELECT * FROM curricula_type WHERE Id like '{$re['Type']}'")['Name'];
		$this->t4=$re['Credit'];
		$this->t5=$row['Score'];
		$this->t6=$this->find_one("SELECT * FROM academy WHERE Id like '{$re['Academy_Id']}'")['Name'];
		$this->add6lines();
	}
}

public function find_one($sql){
	include ("inc.php");
	$result=$mysqli->query($sql);
	$re="";
	while ($row=$result->fetch_array())
	{
		$re=$row;
	}
	return $re;
}

public function countstudents(){
	include ("inc.php");
	$spe=$this->find_one("SELECT * FROM student WHERE Id like '{$_SESSION['ID']}'")['Speciality'];
	$c=$this->find_one("select count(*) as count from student where Speciality like '{$spe}'")['count'];
	echo $c;
}

public function manager_averagescore($ID){
	include ("inc.php");
	$sql="select * from curricula_variable where Student_Id like '{$ID}'";
	$result1=$mysqli->query($sql);
	$above=0;
	$below=0.00000001;
	while ($row1=$result1->fetch_array()){
		$sql="select * from curricula where Id like'{$row1['Curricula_Id']}'";
		$result2=$mysqli->query($sql);
		while ($row2=$result2->fetch_array())
		{
			$below+=$row2['Credit'];
			$jd=$this->scoreexchange($row1['Score']);
			$above+=$row2['Credit']*$jd;
		}
	}
	return round($above/$below,2);
}

public function averagescore(){
	include ("inc.php");
	$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}'";
	$result1=$mysqli->query($sql);
	$above=0;
	$below=0;
	while ($row1=$result1->fetch_array()){
		$sql="select * from curricula where Id like'{$row1['Curricula_Id']}'";
		$result2=$mysqli->query($sql);
		while ($row2=$result2->fetch_array())
		{
			$below+=$row2['Credit'];
			$jd=$this->scoreexchange($row1['Score']);
			$above+=$row2['Credit']*$jd;
		}
	}
	echo round($above/$below,2);
}

public function allscore(){
	include ("inc.php");
	$sql="select * from curricula_variable where Student_Id like '{$_SESSION['ID']}'";
	$result1=$mysqli->query($sql);
	$above=0;
	$below=0;
	while ($row1=$result1->fetch_array()){
		$sql="select * from curricula where Id like'{$row1['Curricula_Id']}'";
		$result2=$mysqli->query($sql);
		while ($row2=$result2->fetch_array())
		{
			$below+=$row2['Credit'];
			$jd=$this->scoreexchange($row1['Score']);
			$above+=$jd;
		}
	}
	echo $above+$below;
}

public function scoreexchange($score){
	if($score>94) return 4.33;
	else if($score>89) return 4.00;
	else if($score>84) return 3.67;
	else if($score>81) return 3.33;
	else if($score>77) return 3.00;
	else if($score>74) return 2.67;
	else if($score>71) return 2.33;
	else if($score>67) return 2.00;
	else if($score>63) return 1.67;
	else if($score>60) return 1.33;
	else if($score==60) return 1.00;
	else if($score<60) return 0;
}

public function alllcredit($ID){
	include ("inc.php");
	$sql="select * from curricula_variable where Student_Id like '{$ID}' and Score >= 60";
	$result=$mysqli->query($sql);
	$getscore=0;
	while ($row=$result->fetch_array()){
		$sql="select * from curricula where Id like'{$row['Curricula_Id']}'";
		$result1=$mysqli->query($sql);
		while ($row1=$result1->fetch_array())
		{$getscore+=$row1['Credit'];}
	}
	return $getscore;
}
}
?>