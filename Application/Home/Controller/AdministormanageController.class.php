<?php
namespace Home\Controller;
use Think\Controller;
class AdministormanageController extends Controller{
  public function index(){
      if(session(userpermission)!=2){
          echo "<script>alert('sorry,you hava no permission!!!')</script>";
          redirect(U('Index/index'),3,'Back to index');
      }
      else{
      $this->display();
  }
  }


     function main(){
        $administrator=M('Adminstrator');
        $count = $administrator->count();
        $page = new \Think\Page($count,8);

        $page->setConfig('pre','Previous &laquo;');
        $page->setConfig('next','下一页 &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();
        $admin_list = $administrator->field(array('Id','Password','Permission'))->limit($page->firstRow.','.$page->listRows)->select();
        //$this->stu_switch_read($student_list['Academy'],$student_list['speciality'],0);
        $this->assign('admin_list',$admin_list);
        $this->assign('page_method',$show);
        $this->display();
    }


     function add(){
             if($_POST['id']!=null){
			 $id = $_POST['id'];

			 $password=$_POST['password'];
			 if(strlen($password)<=3){  echo '<script>;alert("密码强度过低");location.href="add.html";</script>';      }
			 $permission = $_POST['permission'];
			 $administrator = M('Adminstrator');
             if($administrator->where("Id='$id'")->find())
             {
                     $this->error('该管理员信息已经存在！');

             }
			  if($administrator->execute("insert into administrator set Id='$id',Password='$password',Permission='1'"))
			  {
                  $userid=session(username);
                  $this->log($userid,6);
                  echo '<script>;alert("添加完成");location.href="main.html";</script>';
            }
            else{
                echo "<script>;alert('失败！');location.href='main.html';</script>";
            }
			}
            $this->display();
            }




    function delete(){
        if($_GET['id'])
        {
            $Id = $_GET['id'];
            $administrator = M('Adminstrator');         //SELECT * FROM `administrator` WHERE Id="2013014110"
            $userid=session(username);
            $this->log($userid,16);
            $administrator->where("Id = '$Id'")->delete();
		   //echo "<script>;alert('成功！');location.href='main.html';</script>";
            //echo "<script>alert('删除成功')</script>";
            $this->display();
        }
        else
		    { $this->error("参数错误！");   }

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
}

 ?>
