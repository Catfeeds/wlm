<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:dealsAction.classs.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年5月4日
#++++++++++++++++++++++++++++++++++++++
#Time:下午7:35:24
#++++++++++++++++++++++++++++++++++++++
class dealsAction extends CommonAction{
	function _empty(){
		$this->error('参数错误');
	}
	function index(){
		$uid = $_SESSION['uid'];
		if ($uid == null) {
			$this->redirect('User/login');
		}
		import('ORG.Util.Page');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		if(I('tid') != ''){
			$map['cate_id'] = I('tid');
		}
		if(I('r') != ''){
			$map['is_classic'] = 1;
		}
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('sort desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		for ($i = 0 ; $i < count($list) ; $i ++){
			$c = $list[$i]['end_time']-time();
			if ($c>0) {
				$list[$i]['time'] = ceil($c/86400)."天";
			}
			else{
				$list[$i]['time'] = "已结束";
			}
			if (strlen($list[$i]['brief']) > 120) {
				$list[$i]['intro'] = mb_substr($list[$i]['brief'],0,60,'utf-8')."...";
			}
			else{
				$list[$i]['intro'] = $list[$i]['brief'];
			}
			
			$list[$i]['end_time'] = date('Y-m-d',$list[$i]['end_time']);
		}

		$kind = getDealCates();
		$this->assign('cates',$kind);
		
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	function rec(){
		$uid = $_SESSION['uid'];
		if ($uid == null) {
			$this->redirect('User/login');
		}
		import('ORG.Util.Page');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['is_recommend'] = 1;
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('sort desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('index');
	}
	function classic(){
		$uid = $_SESSION['uid'];
		if ($uid == null) {
			$this->redirect('User/login');
		}
		import('ORG.Util.Page');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['is_classic'] = 1;
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('sort desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('index');
	}
	function news(){
		import('ORG.Util.Page');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$time1 = time();
		$time2 = time() - 7*24*60*60;
		$map['create_time'] = array(array('gt',$time2),array('lt',$time1));
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('sort desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('index');
	}
	function nend(){
		import('ORG.Util.Page');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$time1 = time();
		$time2 = time() + 7*24*60*60;
		$map['end_time'] = array(array('gt',$time1),array('lt',$time2));
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('sort desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		for ($i=0 ; $i < count($list) ; $i ++){
			if (substr( $list[$i]['image'], 0, 1 ) == ".") {
				$list[$i]['image'] = substr($list[$i]['image'],1,(strlen($list[$i]['image'])-1));
			}
		}
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('index');
	}
	function search(){
		import('ORG.Util.Page');
		$keyword = trim($_POST['keyword']);
		$map['name'] = array('like','%'.$keyword.'%');
		$db = M('Deal');
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('sort desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		for ($i=0 ; $i < count($list) ; $i ++){
			if (substr( $list[$i]['image'], 0, 1 ) == ".") {
				$list[$i]['image'] = substr($list[$i]['image'],1,(strlen($list[$i]['image'])-1));
			}
		}
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('index');
	}
}

?>