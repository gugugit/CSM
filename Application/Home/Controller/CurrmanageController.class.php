<?php
namespace Home\Controller;
use Think\Controller;

class CurrmanageController extends Controller
{
    public function index(){
        $this->assign('username',session('username'));
        $this->display();
    }
    function main(){
        $curricula = M('Curricula');
        $count = $curricula->count();

        $page = new \Think\Page($count,8);
        $page->setConfig('pre',"&laquo;Previous");
        $page->setConfig('next','Next &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();

        $curricula_list = $curricula->field(array('Id','Name','Credit','Hours','Speciality_Id','Academy_Id','Type','Contain'))->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('curricula_list',$curricula_list);
        $this->assign('page_method',$show);
        $this->display();
    }
    function add(){
        $curricula = M('Curricula');
        $Id = $_POST['curriculaid'];
        if($curricula->where("Id='$Id'")->find()){
            $this->error('该课程信息已经存在！');
        }
        else if($_POST['curriculaid']!=null){

            $message['Id'] = $_POST['curriculaid'];
            $message['Name'] = $_POST['curriculaname'];
            $message['Credit'] = $_POST['curriculacredit'];
            $message['Hours'] = $_POST['curriculahours'];

            $message['Speciality_Id']=$_POST['curriculaspecialityid'];
            $message['Academy_Id']=$_POST['curriculaacademyid'];
            $message['Type']=$_POST['curriculatype'];
            $message['Contain']=$_POST['curriculacontain'];
            //$notification->execute("insert into notification('Id','Time','Title','Content','Visible') values ('$messageid','$messagetime','$messagetitle','$messagecontent','$messagevisible')");
            $curricula->add($message);
            $userid=session(username);
            $this->log($userid,4);
            echo "<script>alert('添加完成！')</script>";
            redirect(U('Currmanage/main'),2,'正在返回');
            $_POST = null;
        }
        $this->display();
    }




    function delete(){
        if($_GET['id'])
        {
            $Id = $_GET['id'];
            $curricula = M('Curricula');
            $curricula->where("Id = '$Id'")->delete();
            $userid=session(username);
            $this->log($userid,14);
            echo "<script>alert('删除完成！')</script>";
            redirect(U('Currmanage/main'),2,'正在返回');

        }
        else{
            $this->error("参数错误！");
        }
        $this->display();
    }
    function edit(){
        if($_GET['id']){
            $Id = $_GET['id'];
            $this->assign('Id',$Id);
            $curricula = M('Curricula');
            $message = $curricula->where("Id = '$Id'")->select();
            $this->assign('curriculaid',$message[0]['id']);
            $this->assign('curriculaname',$message[0]['name']);
            $this->assign('curriculacredit',$message[0]['credit']);
            $this->assign('curriculahours',$message[0]['hours']);
            $this->assign('curriculaacademyid',$message[0]['academy_id']);
            $this->assign('curriculaspecialityid',$message[0]['speciality_id']);
            $this->assign('curriculatype',$message[0]['type']);
            $this->assign('curriculacontain',$message[0]['contain']);

            $this->display();
        }
    }
    function update(){

        $Id = $_GET['id'];
        $curricula = M('Curricula');
        $name=$_POST['curriculaname'];
        $credit = $_POST['curriculacredit'];
        $hours = $_POST["curriculahours"];
        $academy = $_POST["curriculaacademyid"];
        $speciality = $_POST['curriculaspecialityid'];
        $contain=$_POST['curricontain'];
//            echo $teacher->execute("update teacher set Password='$pwd',Academy='$academy',Speciality='$speciality', Phone='$phone',EMail='$email' where Id='$Id'");
        if($curricula->execute("update curricula set Name='$name',Academy_Id='$academy',Speciality_Id='$speciality', Credit='$credit',Hours='$hours',Contain='$contain' where Id='$Id'")){
//                echo '<script>;alert("更新完成！");location.href="main.html";</script>';
            $userid=session(username);
            $this->log($userid,9);
        }
        $this->display();
//            else{
//                echo '<script>;alert("更新失败！");window.location.href="./main.html";</script>';
//            }

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
        $curr = M('curricula');
        $Id = $_POST['searchid'];
        $Name=$_POST['searchname'];

        if($Id!=null||$Name!=null)
        {
            //$count = $curr->count();
//              $rows = mysqli_num_rows("select from teacher WHERE Name='$Name'");
//              $message = $teacher->where("Name = '$Name'")->select();
            $page = new \Think\Page();

            $page->setConfig('pre',"&laquo;Previous");
            $page->setConfig('next','Next &raquo;');
            $page->setConfig('first','&laquo;First');
            $page->setConfig('last', 'Last &raquo;');

            $show = $page->show();
            $curricula_list = $curr->where("Name = '$Name' or Id= '$Id'")->field(array('Id','Name','Credit','Hours','Speciality_Id','Academy_Id','Type','Contain'))->limit($page->firstRow.','.$page->listRows)->select();
            $this->assign('curricula_list',$curricula_list);
            $this->assign('page_method',$show);
            $this->display();
        }
        else
        {
            $this->main();
        }

    }
}
