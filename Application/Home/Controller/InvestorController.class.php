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
                $this->display('Template/project_list.tpl1');
            }
        }else{
        	$investors = M('Investor')->where($where)->order("id DESC")->select();
        	$this->assign('investors',$investors);
        	$this->display();
        }
    }

    public function getinvestors()
    {
    	$where = '';
    	return $where;
    }
    
}
