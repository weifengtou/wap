<?php
namespace Home\Controller;
class IndexController extends HomeController {

    public function index(){
    	/*首页项目*/
    	$projects2 = M('Project')->where("status=2 AND prrate=2")->limit("1")->select();
    	$projects3 = M('Project')->where("status=2 AND prrate=3")->limit("1")->select();
    	$projects4 = M('Project')->where("status=2 AND prrate=4")->limit("1")->select();
    	$projects = array_merge($projects2,$projects3,$projects4);
    	$this->assign('projects',$projects);
    	/*首页新闻*/
    	$category=D('Category')->getChildrenId(news);
		$_list = D('Document')->lists($category, '`level` DESC,`id` DESC', 1,true);
		if(is_array($_list)): 
			$i = 0; 
			if( count($_list)==0 ) : 
				echo "" ;
			else: 
				foreach($_list as $key=>$article): 
					if ($article[position]>3&&$i<3):
						$info = D('Document')->detail($article[id]);
						$cover_id = M('Picture')->where("id='$info[cover_id]'")->find();
						$info['cover_image'] = C('TMPL_PARSE_STRING.__SOURCE_URL__').'/'.$cover_id['path'];
						$news[] = $info;
						$i++;
					endif; 
				endforeach; 
			endif; 
		else: 
			echo "" ;
		endif;
		$this->assign('news',$news);
    	
        $this->display();
    }
}