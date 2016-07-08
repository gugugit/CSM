<?php
namespace Home\Controller;
use Think\Controller;

  class TecmanageController extends Controller{

    public function index(){
        $this->assign('username',session('username'));
        $this->display();
    }
    function main(){
        $teacher = M('Teacher');
        $count = $teacher->count();
        $page = new \Think\Page($count,8);

        $page->setConfig('pre',"&laquo;Previous");
        $page->setConfig('next','Next &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();
        $teacher_list = $teacher->field(array('Id','Name','Sex','Password','Academy','Speciality','Dates_Enrollment','Phone','Identification_Card','Nation','BirthPlace','BirthDay','EMail'))->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('teacher_list',$teacher_list);
        $this->assign('page_method',$show);
        $this->display();
      }
    function add(){
        $teacher = M('Teacher');

        if($teacher->where("Id='$Id'")->find()){
            $this->error('该教师信息已经存在！');
        }
        else if($_POST['teacherid']!=null)
        {
            $message['Id'] = $_POST['teacherid'];
            $message['Name'] = $_POST['teachername'];
            $message['Sex'] = $_POST['sex'];
            $message['Password'] = $_POST['teacherpwd'];
            $date_enroll = mktime(0,0,0,$_POST['emonth'],$_POST['eday'],$_POST['eyear']);
            $da = date("Y-m-d",$date_enroll);
            $message['Dates_Enrollment']=$da;
            $message['Permission']=6;
            $message['Academy']=$_POST['academy'];
            $message['Speciality']=$_POST['speciality'];
            $message['Phone']=$_POST['teacherphonenum'];
            $message['Nation']=$_POST['teachernation'];
            $date_birth = mktime(0,0,0,$_POST['bmonth'],$_POST['bday'],$_POST['byear']);
            $b = date("Y-m-d",$date_birth);
            $message["BirthDay"]=$b;
            $message["BirthPlace"]=$_POST['teacherbirthplace'];
            $message["EMail"]=$_POST['teacheremail'];
            $message["Identification_Card"]=$_POST['teacheridentity'];
            //$notification->execute("insert into notification('Id','Time','Title','Content','Visible') values ('$messageid','$messagetime','$messagetitle','$messagecontent','$messagevisible')");
            $teacher->add($message);
            echo '<script>;alert("添加消息完成");location.href="main.html";</script>';
            $userid=session(username);
            $this->log($userid,2);
            $_POST = null;
        }
        $this->display();
    }
    function delete(){
        if($_GET['id'])
        {
            $Id = $_GET['id'];
            $teacher = M('Teacher');
            $teacher->where("Id = '$Id'")->delete();
            echo "<script>alert('删除完成！')</script>";
            $userid=session(username);
            $this->log($userid,12);
            redirect(U('Tecmanage/main'),2,'正在返回');

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
            $teacher = M('Teacher');
            $message = $teacher->where("Id = '$Id'")->select();
            $this->assign('teacherid',$message[0]['id']);
            $this->assign('teachername',$message[0]['name']);
            $this->assign('teachersex',$message[0]['sex']);
            $this->assign('teacherpwd',$message[0]['password']);
            $this->assign('teacheracademy',$message[0]['academy']);
            $this->assign('teacherspeciality',$message[0]['speciality']);
            $this->assign('teacherenroll',$message[0]['dates_enrollment']);
            $this->assign('teacherphone',$message[0]['phone']);
            $this->assign('teacheridentity',$message[0]['identification_card']);
            $this->assign('teachernation',$message[0]['nation']);
            $this->assign('teacherbirthplace',$message[0]['birthplace']);
            $this->assign('teacherbirthday',$message[0]['birthday']);
            $this->assign('teacheremail',$message[0]['email']);
            $this->display();
        }
    }
    function update(){

            $Id = $_GET['id'];
            $teacher = M('Teacher');
            $pwd=$_POST['teacherpwd'];
            $academy = $_POST['teacheracademy'];
            $phone = $_POST["teacherphone"];
            $email = $_POST["teacheremail"];
            $speciality = $_POST['teacherspeciality'];
//            echo $teacher->execute("update teacher set Password='$pwd',Academy='$academy',Speciality='$speciality', Phone='$phone',EMail='$email' where Id='$Id'");
            if($teacher->execute("update teacher set Password='$pwd',Academy='$academy',Speciality='$speciality', Phone='$phone',EMail='$email' where Id='$Id'")){
            //
            echo "<script>alert('更新完成！')</script>";
                $userid=session(username);
                $this->log($userid,7);
            redirect(U('Tecmanage/main'),3,'正在返回');
            }
//            else{
//                echo '<script>;alert("更新失败！");window.location.href="./main.html";</script>';
//            }

    }
      function quit(){
          $id= session(username);
          $this->log($id,1);
          session(null);
          redirect('__PUBLIC__/../login.html',0,'重新登录');
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
          $teacher = M('teacher');
          $Id = $_POST['searchid'];
          $Name=$_POST['searchname'];

          if($Id!=null||$Name!=null)
          {
              //$count = $teacher->count();
//              $rows = mysqli_num_rows("select from teacher WHERE Name='$Name'");
//              $message = $teacher->where("Name = '$Name'")->select();
              $page = new \Think\Page();

              $page->setConfig('pre',"&laquo;Previous");
              $page->setConfig('next','Next &raquo;');
              $page->setConfig('first','&laquo;First');
              $page->setConfig('last', 'Last &raquo;');

              $show = $page->show();
              $teacher_list = $teacher->where("Name = '$Name' or Id= '$Id'")->field(array('Id','Name','Sex','Password','Academy','Speciality','Dates_Enrollment','Phone','Identification_Card','Nation','BirthPlace','BirthDay','EMail'))->limit($page->firstRow.','.$page->listRows)->select();

              $this->assign('teacher_list',$teacher_list);
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
