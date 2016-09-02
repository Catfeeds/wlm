<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:NewsController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:新闻控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-9
#++++++++++++++++++++++++++++++++++++++
#Time:下午09:47:04
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','新闻管理');
		$News = M('News');
		$count = $News->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$News->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	function del($id){
		$News = M('News');
		if($News->delete($id)){
			$this->success('删除新闻成功');
		}else{
			$this->error('删除新闻失败');
		}
	}
	function lock($id=null,$isshow=null){
		$data['id']=$id;
		$isshow=$isshow==1?'0':'1';
		$data['isshow']=$isshow;
		$News = M('News');
		$News->data($data)->save();
		$this->success('操作成功！');
	}
	function add(){
		$Domain = M('Domain');
		$dlist = $Domain->select();
		$this->assign('dlist',$dlist);
		$NewsType = M('NewsType');
		$nlist = $NewsType->select();
		$this->assign('nlist',$nlist);
		$this->assign('page_name','新闻管理');
		$this->display();
	}
	function insert(){
		$data['title'] = I('title','');
		$data['url'] = I('come');
		$company = I('company');
		$data['company_id'] = $this->getCompanyId($company);
		$data['news_type_id'] = I('news_type_id');
		$data['from_url'] = I('from_url');
		$data['addtime'] = time();
		$data['show_img'] = $this->upload();
		$data['content'] = I('editorValue');
		$data['num_edit'] = I('num_edit');
		#$domain = $_POST['domain'];
		#$data['domain_id'] = $this->getDomainId($domain);
		$News = M('News');
		if($News->data($data)->add()){
			$this->success('添加新闻成功',U('News/index'));
		}else{
			$this->error('添加新闻失败',U('News/index'));
		}
	}
	function edit($id=null){
		$News = M('News');
		$vo = $News->find($id);
		$vo['company'] = $this->getCompanyName($vo['company_id']);
		$vo['domain'] = $this->getDomainArr($vo['domain_id']);
		$this->assign('vo',$vo);
		$this->assign('page_name','新闻管理');
		$NewsType = M('NewsType');
		$nlist = $NewsType->select();
		$this->assign('nlist',$nlist);
		$Domain = M('Domain');
		$dlist = $Domain->select();
		$this->assign('dlist',$dlist);
		$this->display();
	}
	function modify(){
		$data['title'] = I('title','');
		$data['url'] = I('come');
		$data['from_url'] = I('from_url');
		$company = I('company');
		$data['company_id'] = $this->getCompanyId($company);
		$data['content'] = I('editorValue');
		$data['num_edit'] = I('num_edit');
		#$data['news_type_id'] = I('news_type_id');
		/* $domain = $_POST['domain'];
		$data['domain_id'] = $this->getDomainId($domain); */
		$data['id'] = I('id');
		if($_FILES['pic']['tmp_name'] != ''){
			$data['show_img'] = $this->upload();
		}
		$News = M('News');
		if($News->data($data)->save()){
			$this->success('修改新闻成功',U('News/index'));
		}else{
			$this->error('修改新闻失败',U('News/index'));
		}
	}
	
	private function getCompanyId($name){
		$Company = M('Company');
		$map['name'] = $name;
		$cid=$Company->where($map)->getField('id');
		if($cid > 0){
			return $cid;
		}else{
			return 0;
		}
	}
	
	private function getCompanyName($id){		
		if ($id == 0){
			return '添加时候输入的公司/机构名不存在';
		}else{
			$Company = M('Company');
			$map['id'] = $id;
			return $name=$Company->where($map)->getField('name');
		}
	}
	
	private function getDomainId($arr){
		$str = implode(',', $arr);
		return $str;
	}
	
	private function getDomainArr($str){
		$arr = explode(',',$str);
		return $arr;
	}
	
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/news/'; // 设置附件上传根目录
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