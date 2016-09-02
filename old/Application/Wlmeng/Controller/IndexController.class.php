<?php
namespace Wlmeng\Controller;
class IndexController extends ParentController {
    public function index(){
    	$category = getCategory();
    	$backimg = M('backimg')->select();
    	
    	$this->assign('category',$category);
    	$this->assign('backimg',$backimg);
    	$this->display('index');
    }
}