<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class PersonController extends ParentController{
	/**
	  * author         肖萌
	  * describe	  跳转至创业者页面
	  * parameter
	  * return
	  */
	public function goPerson($keyword=""){
		$page = trim(I('get.page'));
	
		if ($page == null || $page == 0) {
			$page = 1;
			$page_this = 1;
			$page_next = 2;
		}
		else{
			$page_this = $page;
			$page_next = $page + 1;
		}
		$domain_select = trim(I('get.domain_s'));
		if ($domain_select == null) {
			$domain_select = 0;
		}
		if ($keyword == "") {
			$keyword = trim(I('get.keyword'));
		}
		
		if ($domain_select != null &&  $domain_select != 0) {
			if ($keyword == null) {
				$where['p.domain_id'] = array(array('like',$domain_select.'|%'),array('like','%|'.$domain_select),array('like','%|'.$domain_select.'|%'),array('eq',$domain_select),'ThinkPHP','or');
				$where['c.type'] = 2;
				$person_num = M('person')->alias('p')->join('th_company c on c.member_id = p.member_id')->where($where)->field('count(*)')->find();
			}
			else{
				$where['p.domain_id'] = array(array('like',$domain_select.'|%'),array('like','%|'.$domain_select),array('like','%|'.$domain_select.'|%'),array('eq',$domain_select),'ThinkPHP','or');
				$where['c.type'] = 2;
				$where['m.username'] = array('like','%'.$keyword.'%');
				$person_num = M('person')->alias('p')->join('member as m on m.id = p.member_id')->join('th_company c on c.member_id = p.member_id')->where($where)->field('count(*)')->find();
			}
		}
		else{
			$where['c.type'] = 2;
			$person_num = M('person')->alias('p')->join('th_company c on c.member_id = p.member_id')->where($where)->field('count(*)')->find();
		}

		$page_show = A('Common')->getPage($person_num['count(*)'],20,$page_this);
		//dump($page_show);
		//exit;
		
		if ($page_next > end($page_show)) {
			$page_next = end($page_show);
		}
	
		if ($domain_select == null || $domain_select == 0) {
			$person = $this->getAllPersonByPage($page,2,$keyword);
		}
		else{
			$person = $this->getPersonByDomain($page,$domain_select,2,$keyword);
		}
		$domain = getDomain();
		$page_last = end($page_show);
		$this->assign('domain',$domain);
		$this->assign('person',$person);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($person_num['count(*)'] / 20));
		if ($keyword != "") {
			$this->assign('keyword',$keyword);
		}
		$this->assign('domain_select',$domain_select);
		
		$this->display('Person/person');
	}
	/**
	 * author         肖萌
	 * describe	  查看创业者
	 * parameter
	 * return
	 */
	public function getOnePerson(){
		$personid = trim(I('get.personid'));
		if ($personid == null) {
			exit;
		}
		$person = M('member')->alias('m')
				  ->join('th_person p on p.member_id = m.id')
				  ->join('th_company c on c.member_id = m.id')
				  ->join('th_province pr on pr.id = c.province_id')
				  ->join('th_city ci on ci.id = c.city_id')
				  ->join('th_domain d on d.id = p.domain_id')
				  ->where('p.id=%d and c.type=2 ',$personid)
				  ->order('c.addtime desc')
				  ->group('c.member_id')
				  ->field('m.id,m.username,c.name,m.face,m.blogurl,d.dname,p.education,p.work,pr.name as pname,ci.name as ciname,c.company_url,c.company_pic,p.intro,c.intro as cintro,c.member_role,p.domain_id')
				  ->find();
		if ($person == null) {
			$person = M('member')->alias('m')
					  ->join('th_person p on p.member_id = m.id')
					  ->join('th_company c on c.member_id = m.id')
					  ->join('th_province pr on pr.code = c.province_id')
					  ->join('th_city ci on ci.code = c.city_id')
					  ->join('th_domain d on d.id = p.domain_id')
					  ->where('p.id=%d and c.type=2',$personid)
					  ->order('c.addtime desc')
					  ->group('c.member_id')
					  ->field('m.id,m.username,c.name,m.face,m.blogurl,d.dname,p.education,p.work,pr.name as pname,ci.name as ciname,c.company_url,c.company_pic,p.intro,c.intro as cintro,c.member_role,p.domain_id')
					  ->find();
		}

		switch ($person['member_role']){
			case 1:
				$person['member_role'] = "创始人";
				break;
			case 2:
				$person['member_role'] = "员工";
				break;
			case 3:
				$person['member_role'] = "投资人";
				break;
			case 4:
				$person['member_role'] = "用户";
				break;
			case 5:
				$person['member_role'] = "发现者";
				break;
		}
		$show = M('showme')->where('member_id=%d',$person['id'])->select();
		$company = M('company')->where('member_id=%d and type=2',$person['id'])->select();
		for ($i = 0 ; $i < count($company) ; $i ++){
			switch ($company[$i]['member_role']){
				case 1:
					$company[$i]['member_role'] = "创始人";
					break;
				case 2:
					$company[$i]['member_role'] = "员工";
					break;
				case 3:
					$company[$i]['member_role'] = "投资人";
					break;
				case 4:
					$company[$i]['member_role'] = "用户";
					break;
				case 5:
					$company[$i]['member_role'] = "发现者";
					break;
			}
		}
		$domain = str_replace("|", ",",$person['domain_id']);
		$domain_arr = M('domain')->where("id in (".$domain.")")->field('dname')->select();
		for ($i = 0 ; $i < count($domain_arr) ; $i ++){
			$domain_array[$i] = $domain_arr[$i]['dname'];
		}
		$person['domain_id'] = A('common')->changetoStr($domain_array);

		$this->assign('show',$show);
		$this->assign('person',$person);
		$this->assign('company',$company);
		$this->display('Person/personIntro');
	}
	
	/**
	 * author         肖萌
	 * describe	  	查看投资人
	 * parameter
	 * return
	 */
	public function getOnePersont(){
		$personid = trim(I('get.personid'));
		if ($personid == null) {
			exit;
		}
		
		$person = M('member')->alias('m')
				  ->join('th_person p on p.member_id = m.id')
				  ->join('th_company c on c.member_id = m.id')
				  ->join('th_province pr on pr.id = c.province_id')
				  ->join('th_city ci on ci.id = c.city_id')
				  ->where('p.id=%d and c.type=1',$personid)
				  ->order('c.addtime desc')
				  ->field('m.id,m.username,c.member_role,c.name,m.face,m.blogurl,p.education,p.work,pr.name as pname,ci.name as ciname,c.company_url,c.company_pic,p.intro,c.intro as cintro')
				  ->find();
		if ($person == null) {
			$person = M('member')->alias('m')
				  	  ->join('th_person p on p.member_id = m.id')
				 	  ->join('th_company c on c.member_id = m.id')
					  ->join('th_province pr on pr.code = c.province_id')
					  ->join('th_city ci on ci.code = c.city_id')
					  ->where('p.id=%d and c.type=1',$personid)
					  ->order('c.addtime desc')
					  ->field('m.id,m.username,c.member_role,c.name,m.face,m.blogurl,p.education,p.work,pr.name as pname,ci.name as ciname,c.company_url,c.company_pic,p.intro,c.intro as cintro')
					  ->find();
		}
		
		switch ($person['member_role']){
			case 1:
				$person['member_role'] = "创始人";
				break;
			case 2:
				$person['member_role'] = "员工";
				break;
			case 3:
				$person['member_role'] = "投资人";
				break;
			case 4:
				$person['member_role'] = "用户";
				break;
			case 5:
				$person['member_role'] = "发现者";
				break;
		}
		$company = M('company')->where('member_id=%d and type=1',$person['id'])->select();
		for ($i = 0 ; $i < count($company) ; $i ++){
			switch ($company[$i]['member_role']){
				case 1:
					$company[$i]['member_role'] = "创始人";
					break;
				case 2:
					$company[$i]['member_role'] = "员工";
					break;
				case 3:
					$company[$i]['member_role'] = "投资人";
					break;
				case 4:
					$company[$i]['member_role'] = "用户";
					break;
				case 5:
					$company[$i]['member_role'] = "发现者";
					break;
			}
		}
		$show = M('showme')->where('member_id=%d',$person['id'])->select();
		
		$this->assign('show',$show);
		$this->assign('person',$person);
		$this->assign('company',$company);
		$this->display('persontIntro');
	}
	
	/**
	  * author         肖萌
	  * describe	跳转至投资者页面
	  * parameter
	  * return
	  */
	public function goPersont($keyword=""){
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
		$domain_select = trim(I('get.domain_s'));
		if ($domain_select == null) {
			$domain_select = 0;
		}
	
		if ($keyword == "") {
			$keyword = trim(I('get.keyword'));
		}
		if ($domain_select != null &&  $domain_select != 0) {
			if ($keyword == null) {
				$where['p.domain_id'] = array(array('like',$domain_select.'|%'),array('like','%|'.$domain_select),array('like','%|'.$domain_select.'|%'),array('eq',$domain_select),'ThinkPHP','or');
				$where['c.type'] = 1;
				$person_num = M('person')->alias('p')->join('th_company c on c.member_id = p.member_id')->where($where)->field('count(*)')->find();
			}
			else{
				$where['p.domain_id'] = array(array('like',$domain_select.'|%'),array('like','%|'.$domain_select),array('like','%|'.$domain_select.'|%'),array('eq',$domain_select),'ThinkPHP','or');
				$where['c.type'] = 1;
				$where['m.username'] = array('like','%'.$keyword.'%');
				$person_num = M('person')->alias('p')->join('member as m on m.id = p.member_id')->join('th_company c on c.member_id = p.member_id')->where($where)->field('count(*)')->find();
			}
		}
		else{
			$where['c.type'] = 1;
			$person_num = M('person')->alias('p')->join('th_company c on c.member_id = p.member_id')->where($where)->field('count(*)')->find();
		}
		
		$page_show = A('Common')->getPage($person_num['count(*)'],20,$page_this);
	
		if ($page_next > end($page_show)) {
			$page_next = end($page_show);
		}
	
	if ($domain_select == null || $domain_select == 0) {
			$person = $this->getAllPersonByPage($page,1,$keyword);
		}
		else{
			$person = $this->getPersonByDomain($page,$domain_select,1,$keyword);
		}
		$page_last = end($page_show);
		$nav = getNav();
		$domain = getDomain();
		$this->assign('domain',$domain);
		$this->assign('person',$person);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($person_num['count(*)'] / 20));
		$this->assign('nav',$nav);
		$this->assign('keyword',$keyword);
		$this->assign('domain_select',$domain_select);
	
		$this->display('Person/persont');
	}
	
	public function searchPerson($con){
		
	}
	
	
	/**
	 * author         肖萌
	 * describe	  获取所有创业者
	 * parameter
	 * return
	 */
	private function getAllPersonByPage($page = 1,$type=2,$keyword){
		$where['c.type'] = $type;
		if ($keyword != "") {
			$where['m.username'] = array('like','%'.$keyword.'%');
		}
		$where['m.lock'] = 1;
		$person = M('member')->alias('m')
				  ->join('th_person p on p.member_id = m.id')
				  ->join('th_company c on c.member_id = m.id')
				  ->limit(($page-1)*20,20)
				  ->order('c.addtime desc')
				  ->where($where)
				  ->group('c.member_id')
				  ->field('m.id,m.username,c.name,c.id as cid,p.domain_id,m.face,c.member_role')
				  ->select();

		$id = 0;
		$person_show = "";
		$j = 0;
		$company_name = "";
		for ($i = 0; $i < count($person) ; $i ++){
			$role = $person[$i]['member_role'];
			if ($role == 1) {
				$person[$i]['member_role'] = "创始人";
			}
			else if($role == 2){
				$person[$i]['member_role'] = "员工";
			}
			else if($role == 3){
				$person[$i]['member_role'] = "投资者";
			}
			else if($role == 4){
				$person[$i]['member_role'] = "用户";
			}
			else if($role == 5){
				$person[$i]['member_role'] = "发现者";
			}
		}
		return $person;
	}
	/**
	  * author         肖萌
	  * describe	  根据领域获取创业者/投资者
	  * parameter
	  * return
	  */
	private function getPersonByDomain($page = 1,$domain_select = 0,$type=2,$keyword){
		$where['p.domain_id'] = array(array('like',$domain_select.'|%'),array('like','%|'.$domain_select),array('like','%|'.$domain_select.'|%'),array('eq',$domain_select),'ThinkPHP','or');
		$where['c.type'] = $type;
		if ($keyword != "") {
			$where['m.username'] = array('like','%'.$keyword.'%');
		}
		$where['m.lock'] = 1;
		$person = M('member')->alias('m')
		->join('th_person p on p.member_id = m.id')
		->join('th_company c on c.member_id = m.id')
		->where($where)
		->order('c.addtime desc')
		->group('c.member_id')
		->limit(($page-1)*20,20)
		->field('m.id,m.username,c.name,c.id as cid,p.domain_id,m.face,c.member_role')
		->select();
		
		$id = 0;
		$person_show = "";
		$j = 0;
		$company_name = "";
		for ($i = 0; $i < count($person) ; $i ++){
			$role = $person[$i]['member_role'];
			if ($role == 1) {
				$person[$i]['member_role'] = "创始人";
			}
			else if($role == 2){
				$person[$i]['member_role'] = "员工";
			}
			else if($role == 3){
				$person[$i]['member_role'] = "投资者";
			}
			else if($role == 4){
				$person[$i]['member_role'] = "用户";
			}
			else if($role == 5){
				$person[$i]['member_role'] = "发现者";
			}
		}
		return $person;
	}
	
	
}