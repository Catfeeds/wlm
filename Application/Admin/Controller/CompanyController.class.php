<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class CompanyController extends ParentController{
	public function company(){
		$com = M('company')->find();
		$this->assign('com',$com);
		$this->display();
	}
	
	public function update(){
		$back = A('Common')->uploadImages('com');
		
		$com['show'] 	= I('show');
		$com['content'] = I('content');
		
		$result = M('company')->where('id=1')->save($com);
		$this->redirect('Company/company');
	}
}