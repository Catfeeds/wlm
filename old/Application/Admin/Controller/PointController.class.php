<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:PointController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:观点管理
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月19日
#++++++++++++++++++++++++++++++++++++++
#Time:下午4:39:47
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class PointController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$Point = M('NavArticle');
		$this->assign('page_name','观点管理');
		$map['pid'] = 99;
		$count = $Point->where($map)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list = $Point->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	function lock($id=null,$isshow=null){
		$NavArticle = M('NavArticle');
		if($isshow == 1){
			$data['isshow'] = 0;
		}else {
			$data['isshow'] =1;
		}
		$data['id'] = $id;
		if($NavArticle->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败');
		}
	}
	
	function del($id=null){
		$NavArticle = M('NavArticle');
		$map['pid'] = $id;
		if($NavArticle->delete($id)){
			$this->success('删除数据成功！');
		}else{
			$this->error('删除数据失败');
		}
	}
	
	function add(){
		$this->assign('page_name','观点管理');
		$this->display();
	}
	
	function insert(){
		$data = $_POST;
		$data = _htmlhandle($data);
		$data['pic'] = $this->upload();
		$data['content'] = $data['editorValue'];
		$NavArticle = M('NavArticle');
		if($NavArticle->data($data)->add()){
			$this->success('添加观点成功');
		}else{
			$this->error('添加观点失败');
		}
	}
	
	function edit($id=null){
		$this->assign('page_name','观点管理');
		$NavArticle = M('NavArticle');
		$vo = $NavArticle->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	function modify(){
		$data = $_POST;
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}
		$data['content'] = $data['editorValue'];
		$NavArticle = M('NavArticle');
		if($NavArticle->data($data)->save()){
			$this->success('修改观点成功!');
		}else{
			$this->error('修改观点失败!');
		}
	}
	
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/navarticle/'; // 设置附件上传根目录
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
}
?>