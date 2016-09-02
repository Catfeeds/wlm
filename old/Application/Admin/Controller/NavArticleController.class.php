<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:NavArticleController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:导航文章控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-4-5
#++++++++++++++++++++++++++++++++++++++
#Time:下午15:39:14
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class NavArticleController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index($id=null){
		$this->assign('page_name','导航文章');
		$map['pid'] = $id;
		$NavArticle = M('NavArticle');
		$count = $NavArticle->where($map)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();		
		$list = $NavArticle->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('pid',$id);
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
	function add($pid=null){
		$this->assign('pid',$pid);
		$this->assign('page_name','导航管理');
		$this->display();
	}
	function insert(){		
		$data = $_POST;
		$data = _htmlhandle($data);
		$data['pic'] = $this->upload();
		$data['content'] = $data['editorValue'];
		$NavArticle = M('NavArticle');
		if($NavArticle->data($data)->add()){
			$this->success('添加导航文章成功');
		}else{
			$this->error('添加导航文章失败');
		}
	}
	function search(){
		$this->assign('page_name','导航文章查找');
		$title = trim(I('title'));
		$pid = I('pid');
		$map['title'] = array('like','%'.$title.'%');
		$map['pid'] = $pid;
		$NavArticle = M('NavArticle');
		$count = $NavArticle->where($map)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$NavArticle->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('title',$title);
		$this->assign('pid',$pid);
		$this->display();
	}
	function edit($id=null){
		$this->assign('page_name','导航文章管理');
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
			$this->success('修改导航文章成功!');
		}else{
			$this->error('修改导航文章失败!');
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