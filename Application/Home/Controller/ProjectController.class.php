<?php
namespace Home\Controller;
class ProjectController extends HomeController {

    public function _initialize()
    {
        parent::_initialize();
        C('SEO_TITLE','好项目');
    }

    public function index(){
        // $this->redirect('projects');
    }

    public function projects()
    {
        $where = $this->getProjects();
        if ($i = I('post.start')) {
            $i = $i*10;
            $projects = M('Project')->where($where)->limit($i.",10")->order("order_id")->select();
            if ($projects) {
                $this->assign('projects',$projects);
                $this->display('Template/project_list.tpl1');
            }
        }else{
        	$projects = M('Project')->where($where)->limit('0,10')->order("order_id")->select();
        	$this->assign('projects',$projects);
        	$this->display();
        }
    }
    public function getProjects()
    {
        $where = [];
        if ($prrate = I("get.prrate")) {
            $where['prrate'] = $prrate;
        }
        if ($cityid = I("get.cityid")) {
            $where['cityid'] = $cityid;
        }
        if ($fathertradeid = I("get.fathertradeid")) {
            $where['fathertradeid'] = $fathertradeid;
        }
        return $where;
    }

    public function proInfo($proId)
    {
    	if (!$proId) {
    		$this->error("链接错误！");
    	}else{
            $proInfo = get_child_detail($proId,1);
    		if (!$proInfo) {
    			$this->error("链接错误！");
    		}else{
    			$this->assign("proInfo",$proInfo);
    			$this->display('proInfo1');
    		}
    	}
    }
}
