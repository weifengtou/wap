<?php
namespace Home\Controller;
class InvestorController extends HomeController {

    public function _initialize()
    {
        parent::_initialize();
        C('SEO_TITLE','投资人');
    }

    public function index(){
        // $this->redirect('investors');
    }

    public function investors()
    {
    	$where = $this->getinvestors();
    	if ($i = I('post.start')) {
            $i = $i*10;
            $investors = M('Investor')->where($where)->order("order_id,id DESC")->limit($i.",10")->select();
            if ($investors) {
                $this->assign('investors',$investors);
                $this->display('Template/investor_list.tpl');
            }
        }else{
        	$investors = M('Investor')->where($where)->order("order_id,id DESC")->limit("0,10")->select();
        	$this->assign('investors',$investors);
        	$this->display();
        }
    }
    public function getinvestors()
    {
        $where = [];
        if ($type=I('get.type')) {
            $where['type'] = $type;
        }
        if ($shiid = I("get.shiid")) {
            $where['shiid'] = $shiid;
        }
        if ($intention = I("get.intention")) {
            $where['intention'] = ['like','%'.$intention.'%'];
        }
        return $where;
    }

    public function invInfo($invId)
    {
    	if (!$invId) {
    		$this->error("链接错误！");
    	}else{
            $invInfo = get_child_detail($invId,2);
    		if (!$invInfo) {
    			$this->error("链接错误！");
    		}else{
    			$this->assign("invInfo",$invInfo);
    			$this->display();
    		}
    	}
    }
}
