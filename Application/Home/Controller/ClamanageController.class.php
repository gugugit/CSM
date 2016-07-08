<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
//session_start();
class ClamanageController extends Controller
{
  public function index()
  {
      $this->assign('username',session('username'));
      $this->display();
  }
  public function addclasroom()
  {
  	$classroom=M('Classroom');
  	$building=M('building');
  	if(isset($_POST["add_clasroom_sub"]))
  	{
  		if($_POST['ID']!=NULL && $_POST['BuildID']!=NULL && $_POST['Contain']!=NULL)
  		{
  		    if($classroom->where("Id=%d and Building_Id=%d",$_POST['ID'],$_POST['BuildID'])->select())
  		    {
  		    	echo '<script>;alert("It existed!");location.href="main.html";</script>';
  		    }
  		    else
  		    {
  		    	$message['Id']=$_POST['ID'];
  		    	$message['Building_Id']=$_POST['BuildID'];
  		    	$message['Contain']=$_POST['Contain'];
  			    $classroom->add($message);
				$userid=session(username);
				$this->log($userid,5);
                echo "<script>alert('添加完成！')</script>";
                redirect(U('Clamanage/main'),2,'正在返回');
  		    }
  		}
  		else
  		{
        echo "<script>alert('添加失败！')</script>";
        redirect(U('Clamanage/main'),2,'正在返回');
  		}
  	//	$_POST=null;
  	}
  	$this->display();
  }
  public function deleteclasroom()
  {
  	if($_GET['id'] && $_GET["building_id"])
  	{
  		$Id=$_GET['id'];
  		$Build=$_GET['building_id'];

  		$classroom=M('Classroom');
  		$shouke=M('shouke');
  		$exam=M('exam');

  		if($shouke->where("Classroom_Id='$Id' and Building_Id='$Build'")->select() || $exam->where("Classroom_Id='$Id' and Building_Id='$Build'")->select() )
  		{
  			echo '<script>;alert("This classroom is in ues.");location.href="main.html";</script>';
  		}
  		else
  		{
  			$classroom->where("Id='$Id'")->delete();
			$userid=session(username);
			$this->log($userid,15);
            echo "<script>alert('删除完成！')</script>";
            redirect(U('Clamanage/main'),2,'正在返回');
  		}
  	}
  	else
  	{
  		echo '<script>;alert("Something is wrong");location.href="main.html";</script>';
  	}
  	$this->display();
  }
  public function main()
  {
  	$classroom=M('Classroom');

  	$count = $classroom->count();
  	$page = new \Think\Page($count,24);

  	$page->setConfig('pre','Previous &laquo;');
  	$page->setConfig('next','next page &raquo;');
  	$page->setConfig('first','&laquo;First');
  	$page->setConfig('last', 'Last &raquo;');
  	$show = $page->show();
	  $classroom_list=$classroom->join('building ON building.Id=classroom.Building_Id')
  	                           ->field(array('classroom.Id','building.Name','classroom.Contain'))
  	                           ->limit($page->firstRow.','.$page->listRows)
  	                           ->order('building.Name desc')
  	                           ->select();
  	$this->assign('classroom_list',$classroom_list);
    $this->assign('page_method',$show);
    $this->display();
  }
	function log($username,$t){
		$log=M('Log');
		$type=M('Logtype');
		$message['UserId']=$username;
		$message['Time']=date("y-m-d-H-i-s");
		$message['Type']=$t;
		$log->add($message);
		$address="log.txt";
		$typename=$type->where(" TypeId= 0 ");
		$file=fopen($address,"a");
		$text=$message['UserId']+"  "+$message['Time']+$typename+'\n';
		fwrite($file,$text);
	}
	function search()
	{
		$classroom = M('classroom');
		$Id = $_POST['searchid'];
		$Building_Id=$_POST['searchname'];

		if($Id!=null||$Building_Id!=null)
		{

			//$count = $classroom->count();
//              $rows = mysqli_num_rows("select from teacher WHERE Name='$Name'");
//              $message = $teacher->where("Name = '$Name'")->select();
			$page = new \Think\Page();

			$page->setConfig('pre',"&laquo;Previous");
			$page->setConfig('next','Next &raquo;');
			$page->setConfig('first','&laquo;First');
			$page->setConfig('last', 'Last &raquo;');

			$show = $page->show();
			$classroom_list = $classroom->where("Building_Id = '$Building_Id' or classroom.Id= '$Id'")->join('building on building.Id=classroom.Building_Id')->field(array('classroom.Id','building.Name','Contain'))->limit($page->firstRow.','.$page->listRows)->select();

			$this->assign('classroom_list',$classroom_list);
			$this->assign('page_method',$show);
			$this->display();
		}
		else
		{
			$this->main();
		}

	}
}
?>
