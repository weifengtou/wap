<?php
namespace Home\Controller;
class InvestorController extends HomeController {

    public function index(){
        // $this->redirect('investors');
    }

    public function investors()
    {
    	$where = $this->getinvestors();
    	if ($i = I('post.start')) {
            $i = $i*3;
            $investors = M('Investor')->where($where)->order("id DESC")->limit($i.",3")->select();
            if ($investors) {
                $this->assign('investors',$investors);
                $this->display('Template/investor_list.tpl');
            }
        }else{
        	$investors = M('Investor')->where($where)->order("id DESC")->limit("0,3")->select();
        	$this->assign('investors',$investors);
        	$this->display();
        }
    }

    public function getinvestors()
    {
    	$where = NULL;
    	if (I('get.sx')=='all') {
    		$where = NULL;
    	}elseif (I('get.sx')=='gr') {
    		$where = "type=1";
    	}elseif (I('get.sx')=='jg') {
    		$where = "type=2";
    	}
    	if(I('get.fathertradeid')!='all'){
    		$where = "fathertradeid like %".I('get.fathertradeid')."%";
    	}else{
    		$where = NULL;
    	}
    	if(I('get.shiid')&&I('get.shiid')!='all'){
    		$where = "shiid=".I('get.shiid');
    	}else{
    		$where = NULL;
    	}
    	return $where;
    }
}
