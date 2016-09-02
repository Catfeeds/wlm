<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class MapController extends ParentController{
	public function goMap(){
		$private = M('province')->where('id <> 0')->field('name,intro')->select();
		$this->assign('prov',json_encode($private));
		$this->display('future_map');
	}
}