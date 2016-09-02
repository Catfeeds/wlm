<?php
use Admin\Controller\ParentController;
class VedioController extends ParentController{
	public function vediolist(){
		$list = M('vedio');
	}
}
