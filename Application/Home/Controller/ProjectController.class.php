<?php
namespace Home\Controller;
class ProjectController extends HomeController {

    public function index(){
        // $this->redirect('projects');
    }

    public function projects()
    {
        $where = $this->getProjects();
        // yc_vp($where,2);
        if ($i = I('post.start')) {
            $i = $i*3;
            $projects = M('Project')->where($where)->limit($i.",3")->order("order_id")->select();
            if ($projects) {
                $this->assign('projects',$projects);
                $this->display('Template/project.tpl1');
            }
        }else{
        	$projects = M('Project')->where($where)->limit('0,3')->order("order_id")->select();
        	$this->assign('projects',$projects);
        	$this->display();
        }
    }

    public function getProjects()
    {
        if ($rz = I("get.rz")) {
            $where = "prrate>0";
        }elseif($prrate = I("get.prrate")){
            $where = "prrate=".$prrate;
        }elseif($city = I("get.city")){
            $where = "city=".$city;
        }elseif($fathertrade = I("get.fathertrade")){
            $where = "fathertrade=".$fathertrade;
        }else{
            $where = "prrate>0";
        }
        return $where;
    }

    public function proInfo($proId)
    {
    	if (!$proId) {
    		$this->error("链接错误！");
    	}else{
    		$proInfo = M('Project')->where("id=".$proId)->limit("1")->select();
    		if (!$proInfo) {
    			$this->error("链接错误！");
    		}else{
    			$this->assign("proInfo",$proInfo);
    			$this->display();
    		}
    	}
    }
}
