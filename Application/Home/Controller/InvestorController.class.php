<?php
namespace Home\Controller;
class InvestorController extends HomeController {

    public function index(){
        // $this->redirect('investors');
    }

    public function investors()
    {
    	$where = $this->getinvestors();
    	$this->display();
    }

    public function getinvestors()
    {
    	$where = '';
    	return $where;
    }
    
}
