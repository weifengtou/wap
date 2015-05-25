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
    	}else{
            $this->error("非法访问！");
        }
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

    public function register()
    {
        if (I('post.signup')) {
            $model = D('Homeuser');
            if ($model->create()) {
                $id = $model->add();
                var_dump("你做激活");
                exit;
            }else{
                exit($model->getError());
            }
        }
        $this->display();
    }

    public function usernameRemote()
    {
        $valid = true;
        if ($username = I("post.username")) {
            $x = M('Homeuser')->where("username='$username'")->select();
            if ($x) {
                $valid = false;
            }
        }else{
            $this->error("非法访问！");
        }
        echo json_encode(array(
            'valid' => $valid,
        ));
    }

    public function emailRemote()
    {
        $valid = true;
        if ($email = I("post.email")) {
            $x = M('Homeuser')->where("email='$email'")->select();
            if ($x) {
                $valid = false;
            }
        }else{
            $this->error("非法访问！");
        }
        echo json_encode(array(
            'valid' => $valid,
        ));
    }
}