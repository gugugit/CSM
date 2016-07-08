<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // if(session(username)==null){
        //     redirect(U('Login/index'));
        // };
        if($_GET['id']!=null){
            session(username,$_GET['id']);
            $this->log($_GET['id'],0);
            $user = M('Adminstrator');
            $username = session(username);
            $permission = $user->where("Id = '$username'")->field('Permission')->select();
            session(userpermission,$permission[0]['permission']);
        }
        $article = M('Adminstrator');
        if($_POST['manageid']!=null)
        {
            session(administratorid,$_POST['manageid']);
            $Id = $_POST['manageid'];
            $this->assign('default2','default-tab');
            if($article->where("Id = '$Id'")->find()){
                $getpassword = $article->where("Id = '$Id'")->select();
            }
            else{
                echo "<script>alert('不存在该管理员！')</script>";
            }
            $this->assign('get_password',$getpassword[0]['password']);
        }
        else
        {
            $this->assign('default1','default-tab');
        }
        if(session(administratorid)!=null && $_POST['managename']!=null)
        {
            $password = md5($_POST['managename']);
            $Id = session(administratorid);
            $article->execute("update Administrator set Password = '$password' where Id = '$Id'");
            echo "<script>alert('修改成功')</script>";
            session(null);
        }
        $count = $article->count();
        //dump($count);
        $page = new \Think\Page($count,8);

        $page->setConfig('pre',"&laquo;Previous");
        $page->setConfig('next','Next &raquo;');
        $page->setConfig('first','&laquo;First');
        $page->setConfig('last', 'Last &raquo;');
			  //$page->setConfig('theme',' %first% %upPage%  %linkPage%  %downPage% %end%');

        $show = $page->show();

        $article_list = $article->field(array('Id','Password' )) -> order('id') ->limit($page->firstRow.','.$page->listRows) ->select();
        //$this->filter(&$article_list);

        $this->assign('news_list',$article_list);
        $this->assign('page_method',$show);
        $this->display();
    }
	  function article(){
    	//跳转到Article控制器的index方法
    	redirect(U('/Article/index'),0, '写新文章');
    }
    function paper(){
        redirect(U('Paper/index'),0, '写新文章');
    }
    function login(){
      redirect(U('/Login/index'),0,'登陆');
    }
    function quit(){
    $id= session(username);
    $this->log($id,1);
      session(null);
      redirect('./../../../login.html',0,'重新登录');
    }
    function stumanage(){
      redirect(U('Stumanage/index'),0,'学生信息管理');
    }
    function delete(){

    }
    function main(){
        $this->assign('title',hahaha);
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
