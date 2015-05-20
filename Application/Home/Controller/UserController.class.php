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

    public function UserValidate()
    {
    	$valid = false;
		echo json_encode(array(
		    'valid' => $valid,
		));
    }
}