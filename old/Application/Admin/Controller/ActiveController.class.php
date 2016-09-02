<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:ActiveController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:活动控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-7
#++++++++++++++++++++++++++++++++++++++
#Time:上午09:26:14
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class ActiveController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	
	function index(){
		$this->assign('page_name','活动管理');
		$Active = M('Actity');
		$count = $Active->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$Active->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);		
		$this->display();
	}
	function lock($id=null,$isshow=null){
		$Active = M('Actity');
		if($isshow == 1){
			$data['isshow'] = 0;
		}else {
			$data['isshow'] =1;
		}
		$data['id'] = $id;
		if($Active->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败');
		}
	}
	function del($id=null){
		$Active = M('Actity');
		if($Active->delete($id)){
			$this->success('删除数据成功！');
		}else{
			$this->error('删除数据失败');
		}
	}
	function add(){
		$this->assign('page_name','活动管理');
		$this->display();
	}
	function insert(){
		$data = $_POST;
		$data = _htmlhandle($data);
		$data['content'] = I('editorValue');
		$data['pic'] = $this->upload();
		$data['addtime'] = time();
		$Active =M ('Actity');
		if($Active->data($data)->add()){
			$this->success('添加活动成功');
		}else{
			$this->error('添加活动失败');
		}
	}
	function search(){
		$this->assign('page_name','活动查找');		
		$pubname = trim(I('pubname'));
		$title = trim(I('title'));
		if($pubname != ''){
			$map['pubname'] = $pubname;
		}
		if($title != ''){
			$map['title'] = $title;
		}
		$map['_logic'] = 'OR';
		$Active = M('Actity');
		$count = $Active->where($map)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		foreach($map as $key=>$val) {
			$Page->parameter[$key] = $val;
		}
		$show = $Page->show();
		$field='pwd,regip,logintime,loginip,face,blogurl';
		$list = $Active->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$data['pubname'] = $pubname;
		$data['title'] = $title;
		$this->assign('rember',$data);
		$this->display();
	}
	function edit($id=null){
		$Active = M('Actity');
		$this->assign('page_name','活动管理');
		$vo = $Active->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	function modify(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data = $_POST;
		$data['content'] = $data['editorValue'];
		$data=_htmlhandle($data);
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}
		$Active = M('Actity');
		if($Active->data($data)->save()){
			$this->success('修改活动成功！',U('Active/index'));
		}else{
			$this->error('修改活动失败');
		}
	}
	
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/actity/'; // 设置附件上传根目录
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