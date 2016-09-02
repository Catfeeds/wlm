<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class IndexController extends ParentController {
    public function index(){
    	$this->display('Index/index');    
    }
}