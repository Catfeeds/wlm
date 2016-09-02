<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:CompanyController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:公司、投资机构控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-9
#++++++++++++++++++++++++++++++++++++++
#Time:下午09:47:04
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class CompanyController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','机构管理');
		$Company=M('Company');
		$count = $Company->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$field='domain_id,invest_type_id,member_role,intro,company_pic';
		$list=$Company->field($field,true)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	function del($id=null){
		$Company=M('Company');
		if($Company->delete($id)){
			$this->success('删除数据成功！');
		}else{
			$this->error('删除数据失败');
		}
	}
	
	function lock($id=null,$isshow=null){
		$Company=M('Company');
		if($isshow == 1){
			$data['isshow'] = 0;
		}else {
			$data['isshow'] =1;
		}
		$data['id'] = $id;
		if($Company->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败');
		}
	}
	
	function info($id=null){
		$Company=M('Company');
		$vo = $Company->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	
	function search(){
		$this->assign('page_name','机构查找');
		$data=$_POST;
		$data['name'] = trim($data['name']);
		if($data['name'] == ''){
			unset($data['name']);
		}
		$Company=M('Company');
		$count = $Company->where($data)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));		
		$Page->setConfig("theme","%HEADER%");
		#$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$field='domain_id,invest_type_id,member_role,intro,company_pic';
		$list = $Company->where($data)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('rember',$data);
		$this->display();
	}
	function add(){
		$this->assign('page_name','机构管理');
		$Province = M('Province');
		$plist = $Province->select();
		$this->assign('plist',$plist);
		$Domain = M('Domain');
		$dlist = $Domain->select();
		$this->assign('dlist',$dlist);
		$InvestType = M('InvestType');
		$ilist = $InvestType->select();
		$this->assign('ilist',$ilist);
		$this->display();
	}
	function insert(){
		$data = $_POST;
		$data['member_id'] = $this->getMemberId(deleteHtml($data['member']));
		if($data['member_id'] == null){
			$this->error('发布者不存在');die;
		}
		$data['domain_id'] = implode('|', $data['domain']);
		$data['invest_type_id'] = implode('|',$data['invest_type']);
		$data['company_pic'] = $this->upload();
		$data['addtime'] = time();
		$data['name'] = deleteHtml($data['name']);
		
		$Company = M('Company');
		if($Company->data($data)->add()){
			$this->success('添加机构(公司)成功',U('Company/index'));
		}else{
			$this->error('添加机构(公司)失败');
		}
	}
	function edit($id=null){
		$this->assign('page_name','机构管理');
		$Province = M('Province');
		$plist = $Province->select();
		$this->assign('plist',$plist);
		$Domain = M('Domain');
		$dlist = $Domain->select();
		$this->assign('dlist',$dlist);
		$InvestType = M('InvestType');
		$ilist = $InvestType->select();
		$this->assign('ilist',$ilist);
		$Company=M('Company');
		$vo = $Company->find($id);
		$vo['member'] = $this->getMemberName($vo['member_id']);
		$vo['domain'] = explode('|', $vo['domain_id']);
		$vo['invest_type'] = explode('|', $vo['invest_type_id']);
		$this->assign('vo',$vo);
		$this->display();
	}
	function modify(){
		$data = $_POST;
		$data['domain_id'] = implode('|', $data['domain']);
		$data['invest_type_id'] = implode('|', $data['invest_type']);
		$data['name'] = deleteHtml($data['name']);

		if($_FILES['pic']['tmp_name'] != ''){
			$data['company_pic'] = $this->upload();
		}
		$Company=M('Company');
		$data['member_id'] = $this->getMemberId(deleteHtml($data['member']));
		if ($data['member_id'] == null) {
			$this->error('发布者不存在');
		}
		if($Company->data($data)->save()){
			$this->success('修改机构/公司信息成功',U('Company/index'));
		}else{
			$this->error('修改机构/公司信息失败');
		}
	}
	
	
	
	private function getMemberId($name){
		$Member = M('Member');
		return $Member->where(array('username'=>$name))->getField('id');
	}
	private function getMemberName($id){
		$Member = M('Member');
		return $Member->where(array('id'=>$id))->getField('username');
	}
	
	private function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/company/'; // 设置附件上传根目录
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
	
	/*Ajax获取城市*/
	public function getCity($code=null){
		$City = M('City');
		$map['provincecode'] = $code;
		$list=$City->where($map)->select();
		$str = '';
		foreach ($list as $k=>$v){
			$str .= '<option value="'.$v[code].'">'.$v[name].'</option>';
		}
		$this->ajaxReturn(array('msg'=>$str));
	}
}
?>