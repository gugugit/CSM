<?php
namespace Home\Controller;
use Think\Controller;
/**
 *
 */
class StumanageController extends Controller{

    public function index()
    {
        $this->assign('username',session('username'));
        $this->display();
    }
    function main(){
        $student=M('Student');
        $count = $student->count();
        $page = new \Think\Page($count,8);

        $page->setConfig('pre','Previous &laquo;');
        $page->setConfig('next','下一页 &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();
        $student_list = $student->field(array('Id','Name','Sex','Academy','speciality'))->limit($page->firstRow.','.$page->listRows)->select();
        //$this->stu_switch_read($student_list['Academy'],$student_list['speciality'],0);
        $this->assign('student_list',$student_list);
        $this->assign('page_method',$show);
        $this->display();
    }
    function read(){
        if($_GET['id']){
            $Id = $_GET['id'];
            $student = M('Student');
            $stumessage = $student->where("Id = '$Id'")->select();
            $this->assign('id',$stumessage[0]['id']);
            $this->assign('name',$stumessage[0]['name']);
            $this->assign('sex',$stumessage[0]['sex']);
            $this->assign('nation',$stumessage[0]['nation']);
            $this->assign('class',$stumessage[0]['class']);
            $this->assign('date',$stumessage[0]['dates_attendance']);
            $this->assign('phone',$stumessage[0]['phone']);
            $this->assign('birthplace',$stumessage[0]['birthplace']);
            $this->assign('birthday',$stumessage[0]['birthday']);
            $this->assign('identification',$stumessage[0]['identification_card']);
            $this->assign('email',$stumessage[0]['email']);
            $this->assign('permission',$stumessage[0]['permission']);
            $this->assign('password',$stumessage[0]['password']);
            $this->stu_switch_read($stumessage[0]['academy'],$stumessage[0]['speciality'],$stumessage[0]['grade']);
        }
        $this->display();
    }
    function edit(){
        if($_GET['id']){
            //$this->assign('a3',"selected");
            $Id=$_GET['id'];
            $this->assign('Id',$Id);
            $student=M('Student');
            $this->assign('stuid',$Id);
            $stumessage=$student->where("Id='$Id'")->select();
            $this->assign('stuname',$stumessage[0]['name']);
            $this->assign('stusex',$stumessage[0]['sex']);
            $this->assign('stunation',$stumessage[0]['nation']);
            $this->assign('stuacademy',$stumessage[0]['academy']);
            $this->assign('stuspeciality',$stumessage[0]['speciality']);
            $this->assign('stuclass',$stumessage[0]['class']);
            $this->assign('stugrade',$stumessage[0]['grade']);
            $this->assign('studate',$stumessage[0]['dates_attendance']);
            $this->assign('stuphone',$stumessage[0]['phone']);
            $this->assign('stubirthplace',$stumessage[0]['birthplace']);
            $this->assign('stubirthday',$stumessage[0]['birthday']);
            $this->assign('stucard',$stumessage[0]['identification_card']);
            $this->assign('stuemail',$stumessage[0]['email']);
            //$this->assign('permission',$stumessage[0]['permission']);
            $this->assign('stupassword',$stumessage[0]['password']);
            $this->stu_switch($stumessage[0]['sex'],$stumessage[0]['academy'],$stumessage[0]['speciality'],$stumessage[0]['grade']);
        }
        else{
            $this->error( "参数错误！");
        }
        $this->display();
    }
    function update(){
        if($_POST['stuid']!=null){
            $Id = $_GET['id'];
            $student = M('Student');
            $stuid = $_POST['stuid'];
            $stuname = $_POST['stuname'];
            $stusex = $_POST['stusex'];
            $stupassword = $_POST['stupassword'];
            $stuacademy = $_POST['stuacademy'];
            $stuspeciality = $_POST['stuspeciality'];
            $stuclass = $_POST['stuclass'];
            $stugrade = $_POST['stugrade'];
            $studate = $_POST['studate'];
            $stuphone = $_POST['stuphone'];
            $stucard = $_POST['stucard'];
            $stunation = $_POST['stunation'];
            $stubirthplace = $_POST['stubirthplace'];
            $stubirthday = $_POST['stubirthday'];
            $stuemail = $_POST['stuemail'];
            if($student->execute("update student set Name='$stuname',Sex='$stusex',
            Password='$stupassword',Academy='$stuacademy',Speciality='$stuspeciality',
            Class='$stuclass',Grade='$stugrade',Dates_Attendance='$studate',
            Phone='$stuphone',Identification_Card='$stucard',Nation='$stunation',
            BirthPlace='$stubirthplace',BirthDay='$stubirthday',EMail='$stuemail' where Id='$Id'")){
                $userid=session(username);
                $this->log($userid,8);
                echo "<script>alert('更新完成！')</script>";
                redirect(U('Stumanage/main'),2,'正在返回');
            }
            else{
            echo "<script>alert('更新失败！')</script>";
            redirect(U('Stumanage/main'),2,'正在返回');
            }
            $this->display();
        }
    }
    function delete(){
        if($_GET['id'])
        {
            $Id = $_GET['id'];
            $student = M('Student');
            $student->where("Id = '$Id'")->delete();
            $userid=session(username);
            $this->log($userid,13);
            echo "<script>alert('删除完成！')</script>";
            redirect(U('Stumanage/main'),2,'正在返回');

        }
        else{
            $this->error("参数错误！");
        }
        $this->display();
    }
    function add(){
        $student = M('Student');
        $Id = $_POST['stuid'];
        if($student->where("Id='$Id'")->find()){
            $this->error('该学生信息已经存在！');
        }
        else if($_POST['stuid']!=null){
            $stu['Id'] = $_POST['stuid'];
            $stu['Name'] = $_POST['stuname'];
            $stu['Sex'] = $_POST['stusex'];
            $stu['Password'] = $_POST['stupassword'];
            $stu['Academy'] = $_POST['stuacademy'];
            $stu['Speciality'] = $_POST['stuspeciality'];
            $stu['Class'] = $_POST['stuclass'];
            $stu['Grade'] = $_POST['stugrade'];
            $stu['Permission'] = $_POST['stupermission'];
            $stu['Dates_Attendance'] = $_POST['studate'];
            $stu['Phone'] = $_POST['stuphone'];
            $stu['Identification_Card'] = $_POST['stucard'];
            $stu['Nation'] = $_POST['stunation'];
            $stu['BirthPlace'] = $_POST['stubirthplace'];
            $stu['BirthDay'] = $_POST['stubirthday'];
            $stu['EMail'] = $_POST['stuemail'];
            $student->add($stu);
            echo '<script>;alert("添加消息完成");location.href="main.html";</script>';
            $userid=session(username);
            $this->log($userid,3);
            $_POST = null;
        }
        $this->display();
    }
    function stu_switch($sex,$academy,$speciality,$grade){
        switch ($sex) {
            case '男':
                $this->assign('g1',"selected");
                break;
            case '女':
                $this->assign('g2',"selected");
                break;
            default:
                break;
        };
        switch ($academy) {
            case '1':
                $this->assign('a1',"selected");
                break;
            case '2':
                $this->assign('a2',"selected");
                break;
            case '3':
                $this->assign('a3',"selected");
                break;
            case '4':
                $this->assign('a4',"selected");
                break;
            case '5':
                $this->assign('a5',"selected");
                break;
            case '6':
                $this->assign('a6',"selected");
                break;
            case '7':
                $this->assign('a7',"selected");
                break;
            case '8':
                $this->assign('a8',"selected");
                break;
            case '9':
                $this->assign('a9',"selected");
                break;
            case '10':
                $this->assign('a10',"selected");
                break;
            case '11':
                $this->assign('a11',"selected");
                break;
            case '12':
                $this->assign('a12',"selected");
                break;
            case '13':
                $this->assign('a13',"selected");
                break;
            case '14':
                $this->assign('a14',"selected");
                break;
            default:
                break;
        };
        switch ($speciality) {
            case '1':
                $this->assign('s1',"selected");
                break;
            case '2':
                $this->assign('s2',"selected");
                break;
            case '3':
                $this->assign('s3',"selected");
                break;
            case '4':
                $this->assign('s4',"selected");
                break;
            case '5':
                $this->assign('s5',"selected");
                break;
            case '6':
                $this->assign('s6',"selected");
                break;
            case '7':
                $this->assign('s7',"selected");
                break;
            case '8':
                $this->assign('s8',"selected");
                break;
            default:
                break;
            };
            switch ($grade) {
                case '1':
                    $this->assign('r1',"selected");
                    break;
                case '2':
                    $this->assign('r2',"selected");
                    break;
                default:
                    break;
            };
    }
    function stu_switch_read($academy,$speciality,$grade){
        switch ($academy) {
            case '1':
                $this->assign('academy',"信息科学与技术学院");
                $student_list['Academy'] = "信息科学与技术学院";
                break;
            case '2':
                $this->assign('academy',"化学工程学院");
                break;
            case '3':
                $this->assign('academy',"材料科学与工程学院");
                break;
            case '4':
                $this->assign('academy',"文法学院");
                break;
            case '5':
                $this->assign('academy',"理学院");
                break;
            case '6':
                $this->assign('academy',"机电工程学院");
                break;
            case '7':
                $this->assign('academy',"经济管理学院");
                break;
            case '8':
                $this->assign('academy',"生命科学与技术学院");
                break;
            case '9':
                $this->assign('academy',"继续教育学院");
                break;
            case '10':
                $this->assign('academy',"职业技术学院");
                break;
            case '11':
                $this->assign('academy',"马克思主义学院");
                break;
            case '12':
                $this->assign('academy',"国际教育学院");
                break;
            case '13':
                $this->assign('academy',"能源学院");
                break;
            case '14':
                $this->assign('academy',"侯德榜工程师学院");
                break;
            default:
                break;
        };
        switch ($speciality) {
            case '1':
                $this->assign('speciality',"计算机科学与技术");
                break;
            case '2':
                $this->assign('speciality',"自动化");
                break;
            case '3':
                $this->assign('speciality',"测控");
                break;
            case '4':
                $this->assign('speciality',"信工");
                break;
            case '5':
                $this->assign('speciality',"化工");
                break;
            case '6':
                $this->assign('speciality',"应化");
                break;
            case '7':
                $this->assign('speciality',"高材");
                break;
            case '8':
                $this->assign('speciality',"经管");
                break;
            default:
                break;
            };
            switch ($grade) {
                case '1':
                    $this->assign('grade',"2013级");
                    break;
                case '2':
                    $this->assign('grade',"2014级");
                    break;
                default:
                    break;
            };
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
        $student = M('student');
        $Id = $_POST['searchid'];
        $Name=$_POST['searchname'];

        if($Id!=null||$Name!=null)
        {
            //$count = $student->count();
//              $rows = mysqli_num_rows("select from teacher WHERE Name='$Name'");
//              $message = $teacher->where("Name = '$Name'")->select();
            $page = new \Think\Page();

            $page->setConfig('pre',"&laquo;Previous");
            $page->setConfig('next','Next &raquo;');
            $page->setConfig('first','&laquo;First');
            $page->setConfig('last', 'Last &raquo;');

            $show = $page->show();
            $student_list = $student    ->where("Name = '$Name' or Id= '$Id'")->field(array('Id','Name','Sex','Password','Academy','Speciality'))->limit($page->firstRow.','.$page->listRows)->select();

            $this->assign('student_list',$student_list);
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
