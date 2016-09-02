<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:SystemController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:系统控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-7
#++++++++++++++++++++++++++++++++++++++
#Time:下午09:11:54
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	
	function index(){
		$System=M('system');
		$vo=$System->find(1);
		$this->assign('vo',$vo);
		$this->assign('page_name','系统设置');
		$this->display();
	}
	
	function edit(){
		if(!IS_POST){
			$this->error('非法操作');
		}
		$data=_htmlhandle($_POST);
		$System=M('system');
		if($System->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败！');
		}
	}
	
	function bg(){
		$this->assign('page_name','首页背景图片管理');
		$Bg = M('Backimg');
		$list = $Bg->order('id desc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	function bginsert(){
		$Bg = M('Backimg');
		$data['pic'] = $this->upload();
		if($Bg->data($data)->add()){
			$this->success('添加背景成功！');
		}else{
			$this->error('添加背景失败！');
		}
	}
	function bgdel($id=null){
		$Bg = M('Backimg');
		if($id == null){
			$this->error('参数错误！');
		}
		if($Bg->delete($id)){
			$this->success('删除背景成功');
		}else{
			$this->error('删除背景失败');
		}
	}
	
	function modify(){
		$data['pic'] = $this->upload();
		$data['id'] = I('id');
		$Bg = M('Backimg');
		if($Bg->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败！');
		}
	}
	
	function log(){
		$this->assign('page_name','日志管理');
		$Log = M('Loginlog');
		$count = $Log->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list = $Log->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		foreach($list as $k=>$v){
			$list[$k]['ip_address'] = $this->GetIpLookup($v['ip']);
		}
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('System/log');
	}
	
	function closeip(){
		$Action = M('Closeip');
		$count = $Action->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list = $Action->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	function ipdel($id=null){
		if($id == null){
			$this->error('参数错误！');
		}
		$Action = M('Closeip');
		if($Action->delete($id)){
			$this->success('解封成功！');
		}else{
			$this->error('解封失败');
		}
	}
	
	function ipinsert(){
		$data['ip'] = I('ip');
		if(trim($data['ip']) == ''){
			$this->error('参数错误,请填写ip地址');
		}
		$Action = M('Closeip');
		if($Action->data($data)->add()){
			$this->success('封锁成功！');
		}else{
			$this->error('封锁失败');
		}
	}
	
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/nav/'; // 设置附件上传根目录
		$upload->autoSub = true;
		$upload->subName = array('date','Ymd');
		$rootpath=$upload->rootPath;
		// 上传单个文件
		$info = $upload->uploadOne($_FILES['pic']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息
			return $rootpath.$info['savepath'].$info['savename'];
		}
	}
	
	private function GetIpLookup($ip = ''){
            $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
            if(empty($res)){ return false; }
            $jsonMatches = array();
            preg_match('#\{.+?\}#', $res, $jsonMatches);
            if(!isset($jsonMatches[0])){ return false; }
            $json = json_decode($jsonMatches[0], true);
            if(isset($json['ret']) && $json['ret'] == 1){
                $json['ip'] = $ip;
                unset($json['ret']);
            }else{
                return false;
            }
            return $json['country'].'-'.$json['province'].'-'.$json['city'];
        }
}
?>