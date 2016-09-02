<?php
/**

  * 文件名

  * ==============================================
  
  * @date: 2015-6-6

  * @author: 肖萌

  * @version:	购物车

  */

class CarAction extends Action{
	/** 
	 * author          肖萌
	 * describe	  	将商品加入购物车
	 * parameter	0:成功加入购物车  1：加入购物车失败  2：未登录  3：购物车中已有改商品
	 * return		 
	 */
	public function incar(){
		$car['deal_id'] = trim(I('post.deal_id'));
		$car['uid'] = $_SESSION['uid'];
		$car['addtime'] = time();
		
		if (!IS_AJAX) {
			exit;
		}
		if ($_SESSION['uid'] == null) {
			$data = 2;
			$this->ajaxReturn($data);
			exit;
		}
		
		$incar['deal_id'] = trim(I('get.deal_id'));
		$incar['uid'] = $_SESSION['uid'];
		$already = M('car')->where($incar)->find();
		if ($already != null) {
			$data = 3;
			$this->ajaxReturn($data);
			exit;
		}
		
		
		$result = M('car')->add($car);
		if ($result) {
			$data = 0;
			$this->ajaxReturn($data);
		}
		else{
			$data = 1;
			$this->ajaxReturn($data);
		}
	}
	
	/** 
	 * author          肖萌
	 * describe	  	获取购物车里的商品
	 * parameter		 
	 * return		 
	 */
	public function car(){
		$uid = $_SESSION['uid'];
		$deal_id = M('car')->where('uid=%d',$uid)->field('deal_id')->select();
		for ($i = 0 ; $i < count($deal_id); $i ++){
			$deal[$i] = $deal_id[$i]['deal_id'];
		}

		$deal_s = A('Common')->changetoStr($deal);
		if ($deal_s == null) {
			$this->display('Public/null');
			exit;
		}
		
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['id'] = array('exp','in('.$deal_s.')');
		$list = $db->where($map)->order('sort desc,id desc')->select();

		$this->assign('pro',$list);
		$this->display('Car/carlist');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	删除购物车中的商品
	 * parameter		 
	 * return		 
	 */
	public function delCar(){
		$map['uid'] = $_SESSION['uid'];
		$map['del_id'] = I('post.deal_id');
		
		if ($_SESSION['uid'] == null) {
			$data = 1;
			$this->ajaxReturn($data);
			exit;
		}
		
		$del = M('car')->where($map)->delete();
		if ($del) {
			$this->redirect('Car/car');
		}
		else{
			$data = 2;
		}
		$this->ajaxReturn($data);
	}
}