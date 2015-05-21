<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {

	public function _initialize()
	{
		session('userInfo')?$this->assign('userInfo',session('userInfo')):'';
	}

}