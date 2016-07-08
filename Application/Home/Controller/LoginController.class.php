<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
  public function index(){
    $this->assign(title,'后台管理登陆');
    $this->display();
  }
    function login(){
    $user = M('Adminstrator');
    $username = $_POST['username'];
    //dump($username);
    $password = $_POST['password'];
    dump($password);
    if(!$this->checklen($username)){
      $this->error('用户名必须在2到15个字符之间');
    }
    if($user->where("ID = '$username' AND Password = '$password'") -> find()){
      session(username,$username);
      $permission = $user->where("Id = '$username'")->field('Permission')->select();
      session(userpermission,$permission[0]['permission']);
      $url = U('Index/index');
      $this->log($username,0);
      redirect($url,0,'后台管理');
    }
    else{
      $this->error('用户名或密码错误！');
    }
  }
  function checklen($data){
    if(strlen($data)>15 || strlen($data)<2){
      return false;
    }
    return true;
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
