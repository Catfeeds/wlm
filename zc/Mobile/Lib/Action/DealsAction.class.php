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
class DealsAction extends CommonAction{
	function _empty(){
		$this->error('参数错误');
	}
	function index(){
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		if(I('tid') != ''){
			$map['cate_id'] = I('tid');
		}
		if(I('r') != ''){
			$map['is_classic'] = 1;
		}
		if (I('r') == 'rec') {
			$map['is_recommend'] = 1;;
		}
		
		$list = $db->where($map)->order('sort desc,id desc')->select();
		for ($i=0 ; $i < count($list) ; $i ++){
			if (substr( $list[$i]['image'], 0, 1 ) == ".") {
				$list[$i]['image'] = substr($list[$i]['image'],1,(strlen($list[$i]['image'])-1));
			}
			
		}
		$this->assign('pro',$list);
		$this->display('Deals/projectlist');
	}
	function rec(){
		import('ORG.Util.Page');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['is_recommend'] = 1;
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
	function classic(){
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['is_classic'] = 1;
		$list = $db->where($map)->order('sort desc,id desc')->select();
		for ($i=0 ; $i < count($list) ; $i ++){
			if (substr( $list[$i]['image'], 0, 1 ) == ".") {
				$list[$i]['image'] = substr($list[$i]['image'],1,(strlen($list[$i]['image'])-1));
			}
		}
		$this->assign('list',$list);
		$this->display('Deals/projectlist');
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
		for ($i=0 ; $i < count($list) ; $i ++){
			if (substr( $list[$i]['image'], 0, 1 ) == ".") {
				$list[$i]['image'] = substr($list[$i]['image'],1,(strlen($list[$i]['image'])-1));
			}
		}
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
	
	function focus(){
		$uid = $_SESSION['uid'];
		if ($uid == null) {
			$this->redirect('User/login');
			exit;
		}
		
		$foc['user_id'] = $uid;
		$dealid = M('deal_focus_log')->where($foc)->field('deal_id')->select();
		for ($i = 0 ; $i < count($dealid); $i ++){
			$deal[$i] = $dealid[$i]['deal_id'];
		}
		$deal_s = A('Common')->changetoStr($deal);
		
		if ($deal_s == null) {
			$this->display('Public/null');
			exit;
		}
		
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['id'] = array('exp','in('.$deal_s.')');
		$list = $db->where($map)->order('sort desc,id desc')->select();
		for ($i = 0 ; $i < count($list) ; $i ++){
			if (strlen($list[$i]['brief']) > 50) {
				$list[$i]['bri'] = mb_substr($list[$i]['brief'],0,50,'utf-8')."...";
			}
		}

		$this->assign('pro',$list);
		
		$this->display('Deals/focuslist');
		
	}
	
	public function delFocus(){
		$user_id = $_SESSION['uid'];
		$deal_id = $_GET['deal_id'];
		M('deal_focus_log')->where('deal_id=%d and user_id=%d',$deal_id,$user_id)->delete();
		
		M('deal')->where('id=%d',$deal_id)->save('focus_count=focus_count-1');
		$this->redirect('Deals/focus');
	}
	
	public function zhuanrang(){
		$this->display('Deals/zhuanranglist');
	}
	
	public function zr(){
		
	}
}

?>