<?php
namespace Home\Controller;
class TestController extends HomeController {

    public function index(){
    	$this->redirect('test2');
    }

    //侧边滑入
    public function test1()
    {
    	$this->display();
    }

    //瀑布流加载
    public function test2()
    {
    	$this->display();
    }
}