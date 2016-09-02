<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:AnliController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:案例控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月7日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:16:54
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class AnliController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','案例管理');
		$Anli = M('Anli');
		$count = $Anli->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$field='pwd,regip,logintime,loginip,face,blogurl';
		$list=$Anli->field($field,true)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	function lock($id=null,$isshow=null){
		$data['id']=$id;
		$isshow=$isshow==1?'0':'1';
		$data['isshow']=$isshow;
		$Anli = M('Anli');
		$Anli->data($data)->save();
		$this->success('操作成功！');
	}
	function del($id=null){
		$Anli = M('Anli');
		if($Anli->delete($id)){
			$this->success('删除案例成功！');
		}else{
			$this->error('删除案例失败！');
		}
	}
	function add(){
		$this->assign('page_name','案例管理');
		$this->display();
	}
	function insert(){
		$data = $_POST;
		$data = _htmlhandle($data);
		$data['content'] = I('editorValue');
		$data['pic'] = $this->upload();
		$data['addtime'] = time();
		$Anli = M('Anli');
		if($Anli->data($data)->add()){
			$this->success('添加案例成功');
		}else{
			$this->error('添加案例失败');
		}
	}
	function edit($id=null){
		$this->assign('page_name','案例管理');
		$Anli = M('Anli');
		$vo = $Anli->find($id);
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
		$Anli = M('Anli');
		if($Anli->data($data)->save()){
			$this->success('修改案例成功！');
		}else{
			$this->error('修改案例失败');
		}
	}
	function search(){
		$this->assign('page_name','案例查找');
		$title = trim(I('title'));
		if($title != ''){
			$map['title'] = array('like','%'.$title.'%');
		}
		$Anli = M('Anli');
		$count = $Anli->where($map)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		foreach($map as $key=>$val) {
			$Page->parameter[$key] = $val;
		}
		$show = $Page->show();
		$list = $Anli->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$data['title'] = $title;
		$this->assign('rember',$data);
		$this->display();
	}
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/anli/'; // 设置附件上传根目录
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