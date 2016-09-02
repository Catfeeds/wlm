<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class InvestController extends ParentController{
	/** 
	 * author          肖萌
	 * describe	  	跳转到投资数据页面
	 * parameter		 
	 * return		 
	 */
	public function goInvstDeal(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page + 1;
		
		$num = M('invest')->alias('i')
				->order('i.addtime desc')
				->where('isshow = 1')
				->limit(($page-1)*20,20)
				->field('count(*)')->find();
		$page_show = A('Common')->getPage($num['count(*)'],20,$page_this);
		$end = end($page_show);

		if ($page_next > $end['page']) {
			
			$page_next = $end['page'];
		}
		
		
		$invst = M('invest')->alias('i')
				 ->join('th_domain d on i.domain_id = d.id')
				 ->order('UNIX_TIMESTAMP(i.addtime) desc')
				 ->where('isshow = 1')
				 ->limit(($page-1)*20,20)
				 ->field('i.*,d.dname')->select();
		$page_last = end($page_show);
		$this->assign('inv',$invst);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',end($page_last['page']));
		$this->display('Invest/invstdeal');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	查看所有投资数据
	 * parameter		 
	 * return		 
	 */
	public function getAllInvest(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
			$page_this = 1;
			$page_next = 2;
		}
		else{
			$page_this = $page;
			$page_next = $page + 1;
		}
		
		$invst_num = M('invest')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($invst_num['num'],5,$page_this);
		
		$invst = M('invest')->alias('i')
				 ->join('th_domain d on i.domain_id = d.id')
				 ->where('isshow = 1')
				 ->order('i.addtime desc')
				 ->limit(($page_this-1)*5,5)
				 ->field('i.*,d.dname')->select();
		$page_last = end($page_show);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($invst_num['num'] / 5));
		$this->assign('inv',$invst);
		$this->display('Invest/investfirm');
	}
	
	public function getOneInvest(){
		$id = trim(I('get.id'));
		$where['i.isshow'] = 1;
		$where['i.id'] = $id;
		$invest = M('invest')->alias('i')
				 ->where($where)
				 ->join('th_domain d on i.domain_id = d.id')
				 ->field('i.*,d.dname')->find();
		$this->assign('invest',$invest);
		$this->display('Invest/investfirmIntro');
	}
	
}