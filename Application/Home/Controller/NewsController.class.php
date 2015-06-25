<?php
namespace Home\Controller;
class NewsController extends HomeController {

    public function index(){
    	/*首页新闻*/
    	$this->redirect("newsList");
    }

	public function getNews($_list,$start=0,$end=3)
	{
		if(is_array($_list)):  
			if( count($_list)==0 ) : 
				$this->assign('news',NULL);
			else:
				for ($i=$start; $i < $end; $i++) { 
					if ($i<count($_list)) {
						$info = D('Document')->detail($_list[$start][id]);
						$cover_id = M('Picture')->where("id='$info[cover_id]'")->find();
						$info['cover_image'] = C('TMPL_PARSE_STRING.__SOURCE_URL__').'/'.$cover_id['path'];
						$news[] = $info;
						$start++;
					}
				}
			endif; 
		else: 
			$this->assign('news',NULL);
		endif;
		$this->news = $news;
		$this->assign('news',$news);
	}

    public function getList()
    {
    	if ($cateId = I("get.cateId")) {
    		$cateTitle = get_category($cateId,'title');
    		$_list = D('Document')->lists($cateId, '`level` DESC,`id` DESC', 1,true);
    	}else{
    		$cateTitle = "所有新闻";
    		$cateId=D('Category')->getChildrenId(news);
    		$_list = D('Document')->lists($cateId, '`level` DESC,`id` DESC', 1,true);
    	}
    	$this->assign('cateTitle',$cateTitle);
    	return $_list;
    }

    public function newsList()
    {
    	$list = $this->getList();
    	if ($i = I('post.start')) {
            $i = $i*3;
            $this->getNews($list,$i,$i+3);
            if ($this->news) {
            	$this->display("Template:news_list.tpl");
            }
        }else{
	    	$this->getNews($list);
	        $this->display();
        }
    }

    public function newsInfo($newsId)
    {
    	$newsInfo = D("Document")->detail($newsId);
    	$newsInfo['content'] = str_replace("/Uploads/Editor/",C("TMPL_PARSE_STRING.__SOURCE_URL__")."/Uploads/Editor/",$newsInfo['content'],$i);
    	$this->assign('newsInfo',$newsInfo);
    	$this->display();
    }
}