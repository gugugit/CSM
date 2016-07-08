<?php
namespace Home\Controller;
use Think\Controller;

class PaperController extends Controller{
	public function index(){
		$User = M('User');
		$T = $User->where('user_id = 2')->select();
		//dump($T);
		$this->assign('title',$T[0][user_name]);
		$this->assign('name',$T[0][user_name]);
		$this->display();
	}

}
