<?php
namespace Home\Controller;
class IndexController extends HomeController {

    public function index(){
    	/****/
    	$projects2 = M('Project')->where("status=2 AND prrate=2")->limit("1")->select();
    	$projects3 = M('Project')->where("status=2 AND prrate=3")->limit("1")->select();
    	$projects4 = M('Project')->where("status=2 AND prrate=4")->limit("1")->select();
    	$projects = array_merge($projects2,$projects3,$projects4);
    	/****/

    	$this->assign('projects',$projects);
        $this->display();
    }
}