<?php
namespace Home\Controller;
class UserCenterController extends HomeController{

	public function _initialize()
	{
		parent::_initialize();
		$userInfo = session('userInfo');
		$userDetail = get_homeuser_info($userInfo[0]['id']);
		$this->assign('userDetail',$userDetail);
	}

	public function index()
	{
		$this->display();
	}

	public function test()
	{
		# code...
	}
}