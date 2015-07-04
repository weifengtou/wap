<?php
namespace Home\Controller;
class HelpController extends HomeController {

	public function _initialize()
    {
        parent::_initialize();
        C('SEO_TITLE','帮助中心');
    }

    public function index(){
        $this->display();
    }
}
