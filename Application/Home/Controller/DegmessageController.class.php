<?php
namespace Home\Controller;
use Think\Controller;
class DegmessageController extends Controller{
    public function index(){
        $this->assign('username',session('username'));
        $this->display();
    }
    function send(){
        if($_POST['stuid']!=null){

            $student=M('Student');
            $Id = $_POST['stuid'];
            $stumail = $student->where("Id = '$Id'")->field('EMail')->select();
            $tomail = $stumail[0]['email'];
        }
        if(SendMail($tomail,$_POST['mailtitle'],$_POST['mailcontent'])){
            $this->success('发送成功！');
            $userid=session(username);
            $this->log($userid,22);
        }
        else{
            $this->error('发送失败！');
        }
    }
    function sendstudent(){
        if($_POST['stuid']!=null){

            $student=M('Student');
            $Id = $_POST['stuid'];
            $stumail = $student->where("Id = '$Id'")->field('EMail')->select();
            $tomail = $stumail[0]['email'];
        }
        if(SendMail($tomail,$_POST['mailtitle'],$_POST['mailcontent'])){
            $this->success('发送成功！');
            $userid=session(username);
            $this->log($userid,21);
        }
        else{
            $this->error('发送失败！');
        }
    }
    function sendtoteacher(){
        if($_POST['teaid']!=null){

            $student=M('Teacher');
            $Id = $_POST['teaid'];
            $stumail = $student->where("Id = '$Id'")->field('EMail')->select();
            $tomail = $stumail[0]['email'];
        }
        if(SendMail($tomail,$_POST['mailtitle'],$_POST['mailcontent'])){
            $this->success('发送成功！');
            $userid=session(username);
            $this->log($userid,20);
        }
        else{
            $this->error('发送失败！');
        }
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
