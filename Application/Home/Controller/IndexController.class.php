<?php
namespace Home\Controller;
class IndexController extends HomeController {

    public function index(){
    	$projects = M('Project')->where("status=2")->select();
    	$this->assign('projects',$projects);
        $this->display();
    }
}