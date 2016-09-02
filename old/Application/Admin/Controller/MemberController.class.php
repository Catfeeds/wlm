<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:MemberController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:会员控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-8
#++++++++++++++++++++++++++++++++++++++
#Time:上午10:16:17
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class MemberController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	
	function index(){
		$this->assign('page_name','会员管理');
		$Member=M('Member');
		$count = $Member->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$field='pwd,regip,logintime,loginip,face,blogurl';
		$list=$Member->field($field,true)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($list as $k=>$v){
			$list[$k]['domain_id'] = M('Person')->where(array('member_id'=>$v['id']))->getField('domain_id');
		}
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	function add(){
		$this->assign('page_name','会员管理');
		$this->display();
	}
	
	function insert(){
		if(!IS_POST){
			$this->error('非法操作');
		}
		$data=$_POST;
		$data=_htmlhandle($data);
		$data['pwd']=md5(md5($data['pwd']));
		$data['regtime'] = time();
		$data['regip'] = get_client_ip();
		$Member=M('Member');
		$memberid=$Member->where(array('username'=>$data['username']))->find();
		if($memberid > 0){
			$this->error('该账号名已经存在，请换一个试试！');
		}
		if($Member->data($data)->add()){
			$per['member_id'] = $Member->getLastInsID();
			$per['objective_id'] = '1';
			$per['domain_id'] = '1';
			$Person=M('Person');
			$Person->data($per)->add();
			$this->success('新曾会员成功！',U('Member/index'));
		}else{
			$this->error('新曾会员失败！');
		}
	}
	
	function lock($id=null,$lock=null){
		$data['id']=$id;
		$lock=$lock==1?'0':'1';
		$data['lock']=$lock;
		$Member=M('Member');
		$Member->data($data)->save();
		$this->success('操作成功！');
	}
	
	function del($id=null){
		$Member=M('Member');
		if($Member->delete($id)){
			$Person=M('Person');
			$Person->where(array('member_id'=>$id))->delete();
			$this->success('删除会员成功！',U('Member/index'));
		}else{
			$this->error('删除会员失败！');
		}
	}
	
	function info($id=null){
		$Member=M('Member');
		$data=$Member->find($id);		
		$arr[0]['k'] = '会员名：';
		$arr[0]['v'] = $data['username'];		
		$arr[2]['k'] = '注册时间：';
		$arr[2]['v'] = date('Y-m-d H:s:i',$data['regtime']);		
		$arr[3]['k'] = '注册IP地址：';
		$arr[3]['v'] = $data['regip'];		
		$arr[4]['k'] = '最近登录时间:';
		$arr[4]['v'] = date('Y-m-d H:s:i',$data['logintime']);		
		$arr[5]['k'] = '最近登录IP地址：';
		$arr[5]['v'] = $data['loginip'];		
		$arr[6]['k'] = '会员头像:';
		$arr[6]['v'] = "<img src='$data[face]' alt='会员头像未上传' />";		
		$arr[7]['k'] = '会员邮箱:';
		$arr[7]['v'] = $data['email'];		
		$arr[8]['k'] = '会员微博:';
		$arr[8]['v'] = $data['blogurl'];		
		$arr[9]['k'] = '会员QQ:';
		$arr[9]['v'] = $data['qq'];		
		$arr[10]['k'] = '会员电话:';
		$arr[10]['v'] = $data['tel'];

		$Person=M('Person');
		$info=$Person->where(array('member_id'=>$id))->find();		
		$per[0]['k'] = '能力：';
		$per[0]['v'] = getAbilityName($info['ability_id']);		
		$per[1]['k'] = '所在省：';
		$per[1]['v'] = getProvinceName($info['province_id']);		
		$per[2]['k'] = '所在市：';
		$per[2]['v'] = getCityName($info['city_id']);		
		$per[3]['k'] = '教育：';
		$per[3]['v'] = $info['education'];		
		$per[4]['k'] = '工作：';
		$per[4]['v'] = $info['work'];		
		$per[5]['k'] = '个人介绍：';
		$per[5]['v'] = $info['intro'];		
		$per[6]['k'] = '会员目的：';
		$per[6]['v'] = getObjectiveName($info['objective_id']);		
		$per[7]['k'] = '关注领域：';
		$per[7]['v'] = getDomainName($info['domain_id']);
		
		$this->assign('list',$arr);
		$this->assign('pre',$per);
		$this->display();
	}
	
	function edit($id=null){
		$this->assign('page_name','会员管理');
		$Member=M('Member');
		$vo=$Member->find($id);
		#var_dump($vo);
		$this->display();
	}
	
	function domain(){
		$id = I('id');
		$this->assign('id',$id);
		$db = M('Domain');
		$list = $db->select();
		$this->assign('list',$list);
		$this->display();
	}
	function mdomain(){
		$map['member_id'] = I('id');
		$data['domain_id'] = implode(I('dname'), '|');
		if ($data['domain_id'] == null) {
			$data['domain_id'] = '1';
		}
		$db = M('Person');
		if($db->data($data)->where($map)->save()){
			$this->success('修改会员领域成功!');
		}else{
			$this->error('修改会员领域失败!');
		}
	}
	
	function search(){
		$this->assign('page_name','会员查找');
		$date = $_POST;
		foreach ($date as $k=>$v){
			$str = trim($v);
			$date[$k] = $str;
			if($str != ''){
				if($k == 'regtime'){
					$time1 = strtotime($v);
					$time2 = $time1+24*60*60;
					$indate[$k] = array('between',array($time1,$time2));
				}else{
					$indate[$k] = $str;
				}
			}		
		}
		$Member=M('Member');
		$count = $Member->where($indate)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%HEADER%");
		#$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$field='pwd,regip,logintime,loginip,face,blogurl';
		$list = $Member->where($indate)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('rember',$date);
		$this->display();
	}
}
?>