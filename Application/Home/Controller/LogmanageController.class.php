<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/18
 * Time: 15:42
 */
namespace Home\Controller;
use Think\Controller;

class LogmanageController extends Controller
{

    public function index()
    {
        $this->assign('username', session('username'));
        $this->display();
    }

    function main()
    {
        $log = M('Log');
        $type = M('Logtype');
        $count = $log->count();
        $page = new \Think\Page($count, 8);

        $page->setConfig('pre', "&laquo;Previous");
        $page->setConfig('next', 'Next &raquo;');
        $page->setConfig('first', '&laquo;First');
        $page->setConfig('last', 'Last &raquo;');

        $show = $page->show();
        $log_list = $log->field(array('Id', 'UserId', 'Time','Type'))->limit($page->firstRow . ',' . $page->listRows)->select();
//        $typename=$type->select("TypeName where TypeId='$log['type']")
        $this->assign('log_list', $log_list);
        $this->assign('page_method', $show);
        $this->display();
    }
    function quit(){
        $id= session(username);
        $this->log($id,1);
        session(null);
        redirect(U('Login/index'),0,'重新登录');
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
