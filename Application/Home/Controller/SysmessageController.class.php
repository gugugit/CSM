<?php
namespace Home\Controller;
use Think\Controller;
class SysmessageController extends Controller{
    public function index(){
        $this->assign('username',session('username'));


        /*$count = $notification->count();

        $page = new \Think\Page($count,8);

        $page->setConfig('pre',"&laquo;Previous");
        $page->setConfig('next','Next &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();
        $notification_list = $notification->field(array('Id','Time','Title'))->order('Id')->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('notification_list',$notification_list);
        $this->assign('page_method',$show);
        *///--修改后注释
        $this->display();
    }
    function delete(){
        if($_GET['id'])
        {
            $Id = $_GET['id'];
            $notification = M('Notification');
            $notification->where("Id = '$Id'")->delete();
            echo "<script>alert('删除完成！')</script>";
            $userid=session(username);
            $this->log($userid,19);
            redirect(U('Sysmessage/main'),2,'正在返回');
        }
        else {
            $this->error("参数错误！");
        }
    }
    function main(){
        $notification = M('Notification');
        $count = $notification->count();
        $page = new \Think\Page($count,8);

        $page->setConfig('pre','Previous &laquo;');
        $page->setConfig('next','下一页 &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();
        $notification_list = $notification->field(array('Id','Time','Title'))->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('notification_list',$notification_list);
        $this->assign('page_method',$show);
        $this->display();
    }
    function add(){
        $notification = M('Notification');
        if($_POST['messagetitle']!=null){
            $time = date('y-m-d H:i:s',time());
            $message['Time'] = $time;
            $message['Title'] = $_POST['messagetitle'];
            $message['Content'] = $_POST['messagecontent'];
            $message['Visible'] = $_POST['messagevisible'];
            //$notification->execute("insert into notification('Id','Time','Title','Content','Visible') values ('$messageid','$messagetime','$messagetitle','$messagecontent','$messagevisible')");
            $notification->add($message);
            echo '<script>;alert("添加消息完成");location.href="main.html";</script>';
            $userid=session(username);
            $this->log($userid,17);
            $_POST = null;
        }
        $this->display();
    }
    function edit(){
        if($_GET['id']){
            $Id = $_GET['id'];
            $this->assign('Id',$Id);
            $notification = M('Notification');
            $message = $notification->where("Id = '$Id'")->select();
            $this->assign('messagetime',$message[0]['time']);
            $this->assign('messagetitle',$message[0]['title']);
            $this->assign('messagecontent',$message[0]['content']);
            $this->display();
        }
    }
    function update(){
        if($_POST['messagetitle']!=null){
            $Id = $_GET['id'];
            $notification = M('Notification');
            $time = date('y-m-d H:i:s',time());
            $title = $_POST['messagetitle'];
            $content = $_POST['messagecontent'];
            if($notification->execute("update notification set Time='$time',Title='$title',Content='$content' where Id='$Id'")){
                $userid=session(username);
                $this->log($userid,18);
                echo "<script>;alert('更新成功！');location.href='../main.html';</script>";
            }
            else{
                echo "<script>;alert('更新失败！');location.href='main.html';</script>";
            }
        }
    }
    function read(){
        if($_GET['id']!=null){
            $Id = $_GET['id'];
            $notification = M('Notification');
            $message = $notification->where("Id='$Id'")->select();
            $this->assign('messagetime',$message[0]['time']);
            $this->assign('messagetitle',$message[0]['title']);
            $this->assign('messagecontent',$message[0]['content']);
            if($message[0]['visible'] == '0'){
                $this->assign('messagevisible',"可见");
            }
            else{
                $this->assign('messagevisible',"不可见");
            }
        }
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
}
  ?>
