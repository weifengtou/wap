<?php
namespace Home\Controller;
class TestController extends HomeController {

    public function index(){
    	$this->redirect('test1');
    }

    //侧边滑入
    public function test1()
    {
    	$this->display();
    }
}