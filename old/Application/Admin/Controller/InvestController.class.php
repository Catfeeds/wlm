<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:InvestController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:投资数据控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-10
#++++++++++++++++++++++++++++++++++++++
#Time:下午08:27:51
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class InvestController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}

	function index(){		
		$this->assign('page_name','投资数据');
		$Invest=M('Invest');
		$count = $Invest->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$Invest->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('domain',$this->domain());
		
		#统计
		$static['0'] = $Invest->where(array('houtai'=>1))->count();
		$static['1'] = $count - $static['0'];
		$this->assign('static',$static);
		$this->display();
	}
	
	function lock($id=null,$isshow=null){
		$data['id']=$id;
		$isshow=$isshow==1?'0':'1';
		$data['isshow']=$isshow;
		$Invest=M('Invest');
		$Invest->data($data)->save();
		$this->success('操作成功！');
	}
	
	function del($id=null){
		$Invest=M('Invest');
		if($Invest->delete($id)){
			$this->success('删除数据成功！',U('Admin/Invest/index'));
		}else{
			$this->error('删除数据失败！');
		}
	}
	
	function add(){
		$this->assign('page_name','数据管理');
		$Domain = M('Domain');//领域 
		$dlist = $Domain->select();
		$this->assign('dlist',$dlist);
		$this->display();
	}
	
	private function domain(){
		$Domain=M('Domain');
		return $Domain->order('id asc')->select();
	}
	
	function search(){
		$this->assign('page_name','数据查找');
		$data=$_POST;
		foreach ($data as $k=>$v){
			$search[$k] = trim($v);			
			if($search[$k] == ''){
				unset($search[$k]);
			}else{
				if($k=='investor'){
					$search[$k] = array('like','%'.$search[$k].'%');
				}
				if($k=='company'){
					$search[$k] = array('like','%'.$search[$k].'%');
				}
			}			
			$data[$k]=trim($v);
		}
		$Invest=M('Invest');
		$count = $Invest->where($search)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		
		$Page->setConfig("theme","%HEADER%");
		#$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$Invest->where($search)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('domain',$this->domain());
		$this->assign('rember',$data);
		$this->display();
	}
	function insert(){
		$data = $_POST;
		$data['pic'] = $this->upload();
		$data['houtai'] = 1;
		$data['investor'] = deleteHtml($data['investor']);
		$data['company'] = deleteHtml($data['company']);
		$string = trim(I('post.ssinvest'));
		$data['inv_id'] = M('Company')->where(array('name'=>$string,'type'=>1))->getField('id');
		if ($data['inv_id'] == null && $data['isshow']==0) {
			$this->error('关联机构不存在!');
			exit;
		}
		$Invest = M('Invest');
		if($Invest->data($data)->add()){
			$this->success('添加投资数据成功!',U('Admin/Invest/index'));
		}else{
			$this->error('添加投资数据失败!');
		}
	}
	function edit($id=null){
		$this->assign('page_name','数据管理');
		$Domain = M('Domain');//领域 
		$dlist = $Domain->select();
		$this->assign('dlist',$dlist);
		$Invest = M('Invest');
		$vo = $Invest->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	function modify(){
		$data = $_POST;
		$data['investor'] = deleteHtml($data['investor']);
		$data['company'] = deleteHtml($data['company']);
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}
		$inv_name = $data['company'];;
		//$data['inv_id'] = M('Company')->where(array('name'=>$inv_name))->getField('id');

		$Invest = M('Invest');
		if($Invest->data($data)->save()){
			$this->success('修改投资数据成功!',U('Admin/Invest/index'));
		}else{
			$this->error('修改投资数据失败!');
		}
	}
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/invest/'; // 设置附件上传根目录
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