<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        echo "index";
    }
    public function login()
    {
    	$this->display();
    }
}