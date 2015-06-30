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
                if ($userInfo[0]['checkemail']!='') {
                    $valid = "x";
                }else{
                    $valid = 1; 
                }
    		}
    	}else{
            $this->error("非法访问！");
        }
		if ($valid==1) {
			session("userInfo",$userInfo);
			echo "欢迎登陆微风投手机版!";
		}elseif($valid=='x'){
            echo "未激活邮箱!";
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
                $model->checkemail = md5(I("post.email").rand(100,999));
                if (sendEmail(I('post.email'),'欢迎使用微风投','尊敬的'.I("post.username").',您好！感谢你的使用微风投。<br>请点击下面的链接激活您的帐号，享受微风投各项服务<br><strong><a style="color:#ff0099;" href="'.C('WEB_URL').'index.php?s=Home/User/active&email='.I('post.email').'&active='.I("post.checkemail").'">'.C('WEB_URL').'index.php?s=Home/User/active&email='.I('post.email').'&active='.I("post.checkemail").'</a>(激活)</strong><br>(如果无法点击该URL链接地址，请将它复制并粘帖到浏览器的地址输入框，然后单击回车即可。该链接使用后将立即失效。)<br><hr>微风投商业模式是一款定位于小微企业中长期融资需求的金融创新产品，即“好项目+投资人+创业者+监管方”的全产业链的多方共赢的商业组合，该组合专注于小微实体企业，让价值链的每一个环节都成为赢家！<br>如果您还有任何疑问，可以通过在线客服联系我们的客服人员，或者拨打400-400-8998进行咨询，我们的客服人员会尽快为您解答！<br><span style="text-algin:right;">微风投客服中心</span><br>关注微风投官方微信(中国微风投)，了解更多融金融咨询。<br>',I("post.username"))==1) {
                    $id = $model->add();
                    $data = $model->select($id);
                    if ($data) {
                        session("userInfo",$data);
                        $this->redirect("registerSuccessPage");
                    }else{
                        $this->error("异常");
                    }
                }else{
                    $this->error("异常");
                }
                exit;
            }else{
                exit($model->getError());
            }
        }
        $this->display();
    }

    public function registerSuccessPage()
    {
        $x = session('userInfo');
        if (!$x&&$x[0]['checkemail']!='') {
            $this->error("非法访问！");
        }else{
            $this->display();
        }
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