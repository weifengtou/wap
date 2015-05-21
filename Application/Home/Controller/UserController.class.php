<?php
namespace Home\Controller;
class UserController extends HomeController {

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
			session("userInfo",$userInfo);
			echo "欢迎登陆微风投手机版!";
		}else{
			echo "用户名或密码错误!";
		}
    }

    public function logout()
    {
        session('userInfo',null);
        $this->redirect('Index/index');
    }
}