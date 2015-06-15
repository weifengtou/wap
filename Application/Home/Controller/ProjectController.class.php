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
        $where = '';
        if (I("get.rz")=="true") {
            $where = "prrate>1";
        }elseif(I("get.rz")=="false"){
            $where = "prrate=1";
            return $where;
            exit();
        }else{
            $where = "prrate>0";
        }
        if ($prrate = I("get.prrate")) {
            $where = "prrate=".$prrate;
        }
        if ($cityid = I("get.cityid")) {
            $where = "cityid=".$cityid;
        }
        if ($fathertradeid = I("get.fathertradeid")) {
            $where = "fathertradeid=".$fathertradeid;
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
