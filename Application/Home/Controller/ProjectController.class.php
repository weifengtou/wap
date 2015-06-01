<?php
namespace Home\Controller;
class ProjectController extends HomeController {

    public function index(){
        // $this->redirect('projects');
    }

    public function projects()
    {
    	$projects = M('Project')->where("prrate>1")->select();

    	$this->assign('projects',$projects);
    	$this->display();
    }

    public function proInfo($proId)
    {
    	if (!$proId) {
    		$this->error("链接错误！");
    	}else{
    		$proInfo = M('Project')->where("id=".$proId)->limit("1")->select();
    		if (!$proInfo) {
    			$this->error("链接错误！");
    		}else{
    			$this->assign("proInfo",$proInfo);
    			$this->display();
    		}
    	}
    }
}
