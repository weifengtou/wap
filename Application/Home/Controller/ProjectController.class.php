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
}
