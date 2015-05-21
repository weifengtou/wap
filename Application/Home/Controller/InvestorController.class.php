<?php
namespace Home\Controller;
class InvestorController extends HomeController {

    public function index(){
        $this->redirect('investors');
    }

    public function investors()
    {
    	$this->display();
    }
    
}
