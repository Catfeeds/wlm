<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:DealAction.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年5月4日
#++++++++++++++++++++++++++++++++++++++
#Time:下午7:40:29
#++++++++++++++++++++++++++++++++++++++
class DealAction extends CommonAction{
	function index(){
		echo '#######';
	}
	function show(){
		$uid = $_SESSION['uid'];
		if ($uid == null) {
			$this->redirect('User/login');
			exit;
		}
		$map['id'] = I('id');
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		
		$vo = $db->where($map)->find();
		$jindu = $vo['support_amount']/$vo['limit_price']*100;
		
		if($jindu > 100){
			$vo['jindu2'] = 100;
		}else{
			$vo['jindu2'] = $jindu;
		}
		$vo['jindu'] = number_format($jindu);
		$content = $vo['description'];
		$string = C('IMG_URL').'./';
		$pattern =  "./";
		$vo['description'] = str_replace($pattern, $string, $content);
		$vo['support_amount'] = number_format($vo['support_amount'],2);
		$vo['needAmount'] = number_format($vo['limit_price'] - $vo['support_amount'],2);
		$vo['limit_price'] = number_format($vo['limit_price'],2);
		if($vo['end_time'] > time()){
			$shenyu = $vo['end_time'] - time();
			$shenyu = $shenyu/(24*60*60);
			$shenyu = number_format($shenyu);
			$vo['tips'] = '此项目还剩余<em>'.$shenyu.'</em>天 , 需完成<em> '.$vo[needAmount].'元</em> 的支持才可成功！';
		}else{
			$vo['tips'] = '此项目在'. date('Y-m-d H:i:s',$vo['end_time']) .'已经过期， 未能达到'.$vo['limit_price'].'元的目标。 ';
		}
		if($vo['success_time'] > 0){
			$vo['tips'] = '此项目在'. date('Y-m-d H:i:s',$vo['end_time']) .'已经过期， 达到'.$vo['limit_price'].'元的目标。 ';
		}
		if($vo['focus_edit'] != null && $vo['focus_edit'] != 0){
		    $vo['focus_show'] = $vo['focus_edit'];
		}
		else{
		    $vo['focus_show'] = $vo['focus_count'];
		}
		if ($vo['dolike'] != null && $vo['dolike'] != 0){
		    $vo['dolike_show'] = $vo['dolike_edit'];
		}
		else{
		    $vo['dolike_show'] = $vo['dolike'];
		}
		
		$this->assign('info',$vo);//assign方法传到页面
		$this->display('proInfo');//跳转页面
	}
	
	public function add(){
		$cate = getDealCate();
		$this->assign('cate',$cate);
		$this->display('introduce');
	}
	
	/**
	 * author          肖萌
	 * describe	  	 关注
	 * parameter
	 * return
	 */
	public function dofoucs(){
		if (!IS_AJAX) {
			exit;
		}
		if ($_POST['deal_id'] == "") {
			$data = 1;
			$this->ajaxReturn($data);
		}
	
		if (condition) {
		}
	
		$foucs['user_id'] = $_SESSION['uid'];
		$foucs['deal_id'] = $_POST['deal_id'];
		$foucs['create_time'] = time();
	
		$isfoucs['user_id'] = $_SESSION['uid'];
		$isfoucs['deal_id'] = $_POST['deal_id'];
		$already = M('deal_focus_log')->where($isfoucs)->find();
		
		if ($already != null) {
			$result = M('deal_focus_log')->where($isfoucs)->delete();
			if ($result) {
				$con['focus_count'] = array('exp','focus_count-1');
				M('deal')->where('id=%d',$foucs['deal_id'])->data($con)->save();
				$data['result'] = 3;
				$deal = M('deal')->where('id=%d',$foucs['deal_id'])->field('focus_count')->find();
				$data['count'] = $deal['focus_count'];
				$this->ajaxReturn($data);
				exit;
			}
			else{
				$data = 2;
			}
		}
		else{
			$result = M('deal_focus_log')->add($foucs);
			if ($result) {
				$data['result'] = 0;
				$con['focus_count'] = array('exp','focus_count+1');
				M('deal')->where('id=%d',$foucs['deal_id'])->data($con)->save();
				$deal = M('deal')->where('id=%d',$foucs['deal_id'])->field('focus_count')->find();
				$data['count'] = $deal['focus_count'];
			}
			else{
				$data = 2;
			}
		}
	
		$this->ajaxReturn($data);
	}
	
	/**
	 * author why
	 * describe  点赞
	 * 
	 */
	public function doLike(){
		
		if (!IS_AJAX) {
			exit;
		}
		if ($_POST['id'] == "") {
			$data = 3;
			$this->ajaxReturn($data);
		}
		
		$dolike['deal_id'] = $_POST['id'];
		$dolike['user_id'] = $_SESSION['uid'];
		//echo $dolike;
		$already = M('deal_dolike_log')->where($dolike)->find();
		if ($already != null) {
			$data = 1;
			$this->ajaxReturn($data);
			exit;
		}
		
		$dolike['create_time'] = time();
		
		M('deal_dolike_log')->add($dolike);
		
		$update['dolike'] = array('exp','dolike+1');
		$where['id'] = $dolike['deal_id'];
		$result = M('deal')->where($where)->save($update);

		if ($result) {
			$data = 0;
		}
		else{
			$data = 2;
		}
		$this->ajaxReturn($data);
	}
	
	
}

?>