<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

    public function index(){
        echo "index";
    }

    public function login()
    {
    	if (I("post.isSubmit")) {
    		var_dump($_POST);
    	}
    	$this->display();
    }

    public function UserValidate()
    {
    	$valid = false;
    	if (I("post.username")=='test') {
    		$valid = true;
    	}
		echo json_encode(array(
		    'valid' => $valid,
		));
    }
}