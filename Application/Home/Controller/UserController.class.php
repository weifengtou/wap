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
    	if (I("post.isSubmit")) {
    		$username = I("post.username");
    		$password = md5(I("post.password"));
    		if ($userInfo = M("Homeuser")->where("username='$username' AND password='$password'")->select()) {
    			$valid = true;
    		}
    	}
		/*echo json_encode(array(
		    'valid' => $valid,
		));*/
		if ($valid) {
			session("userInfo",$userinfo);
			echo "欢迎登陆微风投手机版!";
		}else{
			echo "用户名或密码错误!";
		}
    }
}