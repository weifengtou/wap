<?php
namespace Home\Controller;
class ProjectController extends HomeController {

    public function index(){
        // $this->redirect('projects');
    }

    public function projects()
    {
    	$this->display();
    }
}
